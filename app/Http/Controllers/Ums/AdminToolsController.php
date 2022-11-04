<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use Session;

class AdminToolsController extends Controller
{
    public function dashboard()
    {
        $all_orders = Order::all()->count();
        $successful = Order::whereIn('status', ['Pending', 'Paid', 'Fulfilled'])->count();
        $total = Order::where('status', ['Pending', 'Paid', 'Fulfilled'])->sum('amount');

    	return view('backend.administrator.index', compact('all_orders', 'successful', 'total'));
    }

    public function all_orders()
    {
        $orders = Order::latest()->get();
        return view('backend.administrator.order.all-orders', compact('orders'));
    }

    public function create_order()
    {
        return view('backend.administrator.order.create-order');
    }

    public function store_order(Request $request)
    {
        $this->validate($request, [
            'cus_name'        => 'required',
            'cus_email'      => 'required|email',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'cus_phone'       => 'required|size:11',
            'amount' => 'required',
            'product_name'        => 'required',
            'product_description'      => 'required',
        ]);


        $authorization = "Bearer ". base64_encode(env('POSTPOS_APPKEY').":".md5(env('POSTPOS_SECRETKEY').time()));
        $order_array = ['order' => ['amount' => (float) $request->amount, 'currency' => 'BDT', 'redirect_url' => 'http://localhost:8000', 'ipn_url' => 'http://localhost:8000/dashboard', 'reference' => 'Snigdho'], 'product' => ['name' => $request->product_name, 'description' => $request->product_description], 'billing' => ['customer' => ['name' => $request->cus_name, 'email' => $request->cus_email, 'phone' => $request->cus_phone, 'address' => ['street' => $request->street,  'city' => $request->city,  'state' => $request->state,  'zipcode' => $request->zipcode, 'country' => 'BD']]]];
    
        $order_object = json_encode ($order_array);

        $url = 'https://api-sandbox.portwallet.com/payment/v2/invoice';

        $ch = curl_init($url); 
        
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $order_object);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: '.$authorization ));
        $result = curl_exec($ch);
        curl_close($ch);


        $get = json_decode($result);

        $order = new Order();

        $addresses_array = ['street' => $request->street, 'city' => $request->city, 'state' => $request->state, 'zipcode' => $request->zipcode];

        $order->invoice_id = $get->data->invoice_id;
        $order->cus_name = $request->cus_name;
        $order->cus_email = $request->cus_email;
        
        $order->cus_address = json_encode($addresses_array);

        $order->cus_phone = $request->cus_phone;
        $order->amount = $request->amount;
        $order->product_name = $request->product_name;

        $order->product_description = $request->product_description;

        $attributes_array = [];
        foreach($request['attributes'] as $attribute) {
            $attributes_array[$attribute['attribute_name']] = $attribute['attribute_value'];
        }

        $order->product_attributes = json_encode($attributes_array);

        $order->save();

        Session::flash('success', 'Order Created & PortPos Invoice Generated Successfully !');
        return redirect()->route('all.orders');
    }

    public function update_status(Request $request, $invoice_id)
    {
        $find_order = Order::where('invoice_id', $invoice_id)->first();
        
        $authorization = "Bearer ". base64_encode(env('POSTPOS_APPKEY').":".md5(env('POSTPOS_SECRETKEY').time()));

        $url = 'https://api-sandbox.portwallet.com/payment/v2/invoice/ipn/'.$invoice_id.'/'.$find_order->amount;

        $ch = curl_init($url); 
        
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: '.$authorization ));
        $result = curl_exec($ch);
        curl_close($ch);

        $get = json_decode($result);
        
        $status = $get->data->order->status;
        
        if($status == 'ACCEPTED') {
            $find_order->status = $request->status;
            $find_order->save();

            Session::flash('success', 'Order Status Updated Successfully!');
            return redirect()->route('all.orders');
        } elseif($status == 'PENDING') {
            Session::flash('info', 'Order is still Pending! Try again later.');
            return redirect()->route('all.orders');
        } else {
            $find_order->status = $status;
            $find_order->save();

            Session::flash('error', "Status updated but something went wrong!");
            return redirect()->route('all.orders');
        }

        // $order_array = ['order' => ['amount' => (float) $find_order->amount, 'currency' => 'BDT', 'redirect_url' => 'http://localhost:8000', 'ipn_url' => 'http://localhost:8000/dashboard', 'reference' => 'Snigdho'], 'product' => ['name' => $find_order->product_name, 'description' => $find_order->product_description], 'billing' => ['customer' => ['name' => $find_order->cus_name, 'email' => $find_order->cus_email, 'phone' => $find_order->cus_phone, 'address' => ['street' => $cus_address->street,  'city' => $cus_address->city,  'state' => $cus_address->state,  'zipcode' => $cus_address->zipcode, 'country' => 'BD']]]];
    
        // $order_object = json_encode ($order_array);

        // $url = 'https://api-sandbox.portwallet.com/payment/v2/invoice/ipn/'.$invoice_id.'/'.$find_order->amount;

        // $ch = curl_init($url); 
        
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $order_object);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: '.$authorization ));
        // $result = curl_exec($ch);
        // curl_close($ch);
        // dd($result);


        Session::flash('success', 'Order Status Updated Successfully !');
        return redirect()->route('all.orders');
    }

    public function refund(Request $request, $invoice)
    {
        $find_order = Order::where('invoice_id', $invoice)->first();
        
        $authorization = "Bearer ". base64_encode(env('POSTPOS_APPKEY').":".md5(env('POSTPOS_SECRETKEY').time()));


        $find_order->status = 'Refund';
        $find_order->save();

        $refund_array = ['refund' => ['amount' => (float) $find_order->amount]];
    
        $refund_object = json_encode ($refund_array);

        $url_one = "https://api-sandbox.portwallet.com/payment/v2/invoice/refund/{$invoice}";
        
        $ch_one = curl_init($url_one); 
        
        curl_setopt($ch_one, CURLOPT_POST, 1);
        curl_setopt($ch_one, CURLOPT_POSTFIELDS, $refund_object);
        curl_setopt($ch_one, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch_one, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: '.$authorization ));
        $result_one = curl_exec($ch_one);
        curl_close($ch_one);

        Session::flash('error', 'Order Refund Request Placed Successfully !');
        return redirect()->route('all.orders');
    }

    // public function check_invoice($invoice_id)
    // {
    //     $authorization = "Bearer ". base64_encode(env('POSTPOS_APPKEY').":".md5(env('POSTPOS_SECRETKEY').time()));
    //     $url = "https://api-sandbox.portwallet.com/payment/v2/invoice/{$invoice_id}";

    //     $ch = curl_init($url); 
        
    //     curl_setopt($ch, CURLOPT_POST, 0);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: '.$authorization ));
    //     $result = curl_exec($ch);
    //     curl_close($ch);

    //     dd($result);
    // }

}
