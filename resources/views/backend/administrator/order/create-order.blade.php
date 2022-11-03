@extends('layouts.master')
@section('title', 'Generate New Order')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"> Generate New Order</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Generate New Order</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    
                    @if(count($errors) > 0)
                        <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                            <x-jet-validation-errors class="mb-4 my-2 text-white" />
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="repeater needs-validation" action="{{ route('store.order') }}" method="post" novalidate="">
                            @csrf

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter customer name" name="cus_name" value="{{ old('cus_name') }}" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter customer name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip50" class="form-label">Customer E-mail</label>
                                            <input type="email" class="form-control" id="validationTooltip50" placeholder="Enter customer email" name="cus_email" value="{{ old('name') }}" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter customer's valid email.
                                            </div>
                                        </div>
                                    </div>                                    

                                </div>

                                <br>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip06" class="form-label">Customer Phone no.</label>
                                            <input type="tel" class="form-control" id="validationTooltip06" placeholder="Enter Phone" pattern="[0-9]{11}" name="cus_phone" value="{{ old('cus_phone') }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter customer's 11 digit valid phone number.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip03" class="form-label">Street</label>
                                            <input type="text" class="form-control" id="validationTooltip03" placeholder="Enter Street" name="street" value="{{ old('street') }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter street.
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip16" class="form-label">City</label>
                                            <input type="text" class="form-control" id="validationTooltip16" placeholder="Enter City" name="city" value="{{ old('city') }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter city.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip17" class="form-label">State</label>
                                            <input type="text" class="form-control" id="validationTooltip17" placeholder="Enter State" name="state" value="{{ old('state') }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter state.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip18" class="form-label">Zipcode</label>
                                            <input type="number" class="form-control" id="validationTooltip18" placeholder="Enter Zipcode" name="zipcode" value="{{ old('zipcode') }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter zipcode.
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter product name" name="product_name" value="{{ old('product_name') }}" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter product name.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip100" class="form-label">Amount (BDT)</label>
                                            <input type="number" step="0.01" class="form-control" id="validationTooltip100" placeholder="Enter product amount" name="amount" value="{{ old('amount') }}" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter valid product amount.
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="short" class="form-label">Product Description </label>
                                            <textarea id="short" rows="6" name="product_description" class="form-control" required>{{ old('product_description') }}</textarea>
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter product description.
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="attributes" class="form-label">Add Attributes</label>
                                            <div data-repeater-list="attributes">
                                                <div data-repeater-item class="row">
                                                    <div  class="mb-3 col-lg-4">
                                        
                                                        <input type="text" id="attribute_name" name="attribute_name" class="form-control" placeholder="Attribute Name"/>
                                                    </div>

                                                    <div class="mb-3 col-lg-6">
                                                        
                                                        <input type="text" id="attribute_value" name="attribute_value" class="form-control" placeholder="Attribute Value"/>
                                                    </div>
                                                    
                                                    <div class="mb-3 col-lg-2 align-self-center">
                                                        <div class="d-grid">
                                                            <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input data-repeater-create type="button" class="btn btn-light mt-3 mt-lg-0" value="Click to add new"/>

                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Save New Order</button>
                                        
                                    </div>
                            
                                </div>

                            </form>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection
