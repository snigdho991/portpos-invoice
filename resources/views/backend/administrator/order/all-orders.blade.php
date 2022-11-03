@extends('layouts.master')
@section('title', 'All Orders')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Orders</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;">
                                            SL
                                        </th>
                                        <th class="align-middle">Placed By</th>
                                        <th class="align-middle">Invoice ID</th>
                                        <th class="align-middle">Amount</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Update Status</th>
                                        <th class="align-middle">Refund</th>
                                        <th class="align-middle">Invoice Link</th>
                                        <th class="align-middle">Email Address</th>
                                        <th class="align-middle">Order Date</th>
                
                                    </tr>
                                </thead>


                                <tbody>
                                @foreach($orders as $key => $order)

                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $order->cus_name }}
                                        </td>
                                        
                                        <td>
                                            {{ $order->invoice_id }}
                                        </td>

                                        <td>
                                            ৳ {{ $order->amount }}
                                        </td>

                                        <td>
                                            {{ $order->status }}
                                        </td>

                                        <td>
                                            @if($order->status == 'Pending' || $order->status == 'Paid' || $order->status == 'Fulfilled')
                                                <form class="needs-validation" action="{{ route('update.status', $order->invoice_id) }}" method="post" novalidate="">
                                                    
                                                    @csrf
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-9 col-sm-6" style="padding-right: 0;">
                                                            <select class="form-control" id="updateStatus" name="status" required="">
                                                
                                                                <option value="">Select Any Status</option>
                                                                <option value="Paid">Paid</option>
                                                                <option value="Fulfilled">Fulfilled</option>
                                                                    
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-sm-6" style="margin: auto;">
                                                            <button type="submit" class="btn btn-success editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-check"></i></button>
                                                        </div>
                                                    </div>

                                                </form>
                                            @else
                                                <div class="col-lg-12 col-sm-6" style="padding-right: 0;">
                                                    <select class="form-control" id="updateStatus">
                                        
                                                        <option value="{{ $order->status }}" selected>{{ $order->status }}</option>

                                                    </select>
                                                </div>
                                            @endif

                                        </td>

                                        <td style="vertical-align: middle;">

                                            @if($order->status != 'Refund')
                                                <form class="needs-validation" action="{{ route('refund', $order->invoice_id) }}" method="post" novalidate="">
                                                    
                                                    @csrf
                                                    
                                                    
                                                    <button type="submit" class="btn btn-dark editable-submit btn-sm waves-effect waves-light" onclick="return confirm('Are you sure to send a refund request?')" ><i class="bx bx-map-pin me-1" style="position: relative; top: 1px;"></i> Refund Request <i class="bx bxs-right-arrow bx-fade-right" style="position: relative; top: 1.3px;"></i></button>

                                                </form>   
                                            @else
                                                <span class="badge badge-pill badge-soft-danger font-size-12">Refund Requested</span>
                                            @endif

                                        </td>

                                       <td style="text-align: center; vertical-align: middle;">
                                            
                                            <div class="inline" style="display: flex; gap: 10px;">
                                                <input type="hidden" value="https://payment-sandbox.portwallet.com/payment/?invoice={{ $order->invoice_id }}" id="invoiceInput">
                                                <a class="btn btn-outline-primary btn-sm edit" href='https://payment-sandbox.portwallet.com/payment/?invoice={{ $order->invoice_id }}' target="_blank" title="View Invoice">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                
                                                <button class="btn btn-outline-dark btn-sm edit" onclick="copyClick()" title="Copy Link">
                                                    <i class="fas fa-pencil-alt"></i> Copy
                                                </button>
                                            </div>

                                        </td>

                                        <td>
                                            {{ $order->cus_email }}
                                        </td>

                                        <td>
                                            {{ $order->created_at->format('F d, Y') }}
                                        </td>

                                        {{-- <td>
                                            <a class="btn btn-dark btn-sm" href="{{ route('check.invoice', $order->invoice_id) }}"><i class="bx bx-map-pin me-1" style="position: relative; top: 1px;"></i> View Details <i class="bx bxs-right-arrow bx-fade-right" style="position: relative; top: 1.3px;"></i></a> 
                                        </td> --}}

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection

@section('styles')
    <style type="text/css">

        @media screen and (min-width: 1148px) {
            .table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before {
                margin-top: -18px !important;
            }
        }

    </style>
@endsection

@section('scripts')
    <script>

        function copyClick() {
            var copyText = document.getElementById('invoiceInput').value;
            navigator.clipboard.writeText(copyText);
        }

    </script>
@endsection
