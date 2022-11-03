@extends('layouts.frontend-master')

@section('title', 'Index Page')

@section('content')
        
    <section class="section hero-section bg-ico-hero" id="home" style="padding-top: 150px; padding-bottom: 100px;">
        <div class="bg-overlay bg-primary"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Supplementtext - Dummy text will be here</h1>
                        <p class="font-size-14">Dummy details will be here.</p>
                        
                        <div class="button-items mt-4">
                            <a href="#" class="btn btn-success">Upcoming Events</a>
                            <a href="#" class="btn btn-light">Prior Offers</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 col-sm-12 ms-lg-auto">
                    <div class="card overflow-hidden mb-0 mt-5 mt-lg-0">
                        
                            <iframe width="546" height="375" src="https://www.youtube.com/embed/bxoYtCfIBXQ" frameborder="0" title="YouTube video describing the WineText service" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                        
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <section class="section pt-4 bg-white" id="about" style="padding-top:40px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Why us?</div>
                        <h4>Supplementtext.com</h4>
                    </div>

                    <div class="col-lg-12">
                        <div class="card border">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                            <i class="mdi mdi-ethereum"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h4>The Easiest Way to Buy High Quality Wine</h4>
                                        <p><i class="mdi mdi-arrow-down ms-1 text-danger"></i> At Ridiculously Low Prices</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row align-items-center">
                <div class="col-lg-12">

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h4>Setup your free subscription</h4>
                        <div class="small-title">
                            Setup your free daily text subscription in less than 2 mins and get our daily deal text... Like it? Respond with just the number of bottles and you're all set. 10 seconds/day to get the most ridiculous wine deals delivered to your doorstep.
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if(count($errors) > 0)
                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                    <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate="">
                                @csrf

                                <h4 style="text-align: center; margin-bottom: 20px;">Basic Information</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">E-mail</label>
                                            <input type="email" class="form-control" id="validationTooltip01" placeholder="Enter E-mail here" name="email" value="{{ old('email') }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter e-mail address.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip02" class="form-label">Cell Phone</label>
                                            <input type="email" class="form-control" id="validationTooltip02" name="email" value="{{ old('email') }}" placeholder="Enter Cell Phone">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your valid cell number.
                                            </div>
                                        </div>
                                    </div>                                               
                                </div>

                                <br>

                                <h4 style="text-align: center; margin-bottom: 20px;">WHERE CAN WE SHIP IT FOR YOU?</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip03" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="validationTooltip03" placeholder="Enter Your First Name" name="firstname">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your first name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip04" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="validationTooltip04" placeholder="Enter Your Last Name" name="lastname">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your last name.
                                            </div>
                                        </div>
                                    </div>                                           
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip05" class="form-label">Business Name (optional)</label>
                                            <input type="text" class="form-control" id="validationTooltip05" placeholder="Enter Your Business Name" name="businessname" value="{{ old('businessname') }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip06" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="validationTooltip06" placeholder="Enter Your Address" name="address" value="{{ old('address') }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip11" class="form-label">Zip</label>
                                            <input type="number" min="0" class="form-control" id="validationTooltip11" placeholder="Enter Your Zip Code Here" name="id1" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your zip code here.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip12" class="form-label">City</label>
                                            <input type="text" class="form-control" id="validationTooltip12" placeholder="Enter Your City" name="city" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your city.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip13" class="form-label customState">State</label>
                                            <br>
                                            <select class="form-control select2" required="" name="state" id="validationTooltip13">
                                                <option value="">Select State</option>
                                                <optgroup label="All States">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DC">District Of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                            </select>

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please select your state.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Sign Up</button>
                                        
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

        </div>
        <!-- end container -->
    </section>


    <section class="section bg-white" id="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Events</div>
                        <h4>Latest Events</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-4 col-sm-6">
                    <div class="blog-box mb-4 mb-xl-0">
                        <div class="position-relative">
                            <img src="assets/images/crypto/blog/img-1.jpg" alt="" class="rounded img-fluid mx-auto d-block">
                            <div class="badge bg-success blog-badge font-size-11">Tag here</div>
                        </div>

                        <div class="mt-4 text-muted">
                            <p class="mb-2"><i class="bx bx-calendar me-1"></i> 04 Mar, 2022</p>
                            <h5 class="mb-3">Donec pede justo, fringilla vele</h5>
                            <p>If several languages coalesce, the grammar of the resulting language</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="blog-box mb-4 mb-xl-0">

                        <div class="position-relative">
                            <img src="assets/images/crypto/blog/img-2.jpg" alt="" class="rounded img-fluid mx-auto d-block">
                            <div class="badge bg-success blog-badge font-size-11">Tag here</div>
                        </div>

                        <div class="mt-4 text-muted">
                            <p class="mb-2"><i class="bx bx-calendar me-1"></i> 12 Feb, 2022</p>
                            <h5 class="mb-3">Aenean ut eros et nisl</h5>
                            <p>Everyone realizes why a new common language would be desirable</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="blog-box mb-4 mb-xl-0">
                        <div class="position-relative">
                            <img src="assets/images/crypto/blog/img-3.jpg" alt="" class="rounded img-fluid mx-auto d-block">
                            <div class="badge bg-success blog-badge font-size-11">Tag here</div>
                        </div>

                        <div class="mt-4 text-muted">
                            <p class="mb-2"><i class="bx bx-calendar me-1"></i> 06 Jan, 2022</p>
                            <h5 class="mb-3">In turpis, pellentesque posuere</h5>
                            <p>To an English person, it will seem like simplified English, as a skeptical Cambridge</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: center; margin-top: 25px;">
                    <a href="" class="btn btn-success"> Show All <i class="bx bx-right-arrow-circle font-size-20 align-middle me-1"></i></a>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>


    <section class="section" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Offers</div>
                        <h4>Recent Top Deals</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="col-lg-12">
                <div class="owl-carousel owl-theme" id="team-carousel" dir="ltr">
                    <div class="item">
                        <div class="card text-center team-box">
                            <div class="card-body">
                                <div>
                                    <div class="zoom-gallery d-flex flex-wrap">
                                        <a href="assets/images/offers/01.jpg" title="Title Here">
                                            <img src="assets/images/offers/01.jpg" alt="" class="rounded">
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <h5>2017 Seabold Chardonnay Simpatico Ranch</h5>
                                    <P class="text-muted mb-0">$19.37</P>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="item">
                        <div class="card text-center team-box">
                            <div class="card-body">
                                <div>
                                    <div class="zoom-gallery d-flex flex-wrap">
                                        <a href="assets/images/offers/01.jpg" title="Title Here">
                                            <img src="assets/images/offers/01.jpg" alt="" class="rounded">
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <h5>2013 San Filippo Brunello Di Montalcino Lucere</h5>
                                    <P class="text-muted mb-0">$49.89</P>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="item">
                        <div class="card text-center team-box">
                            <div class="card-body">
                                <div>
                                    <div class="zoom-gallery d-flex flex-wrap">
                                        <a href="assets/images/offers/01.jpg" title="Title Here">
                                            <img src="assets/images/offers/01.jpg" alt="" class="rounded">
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h5>2015 Castello Di Meleto Vigna Casi Riserva...</h5>
                                    <P class="text-muted mb-0">$19.91</P>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="item">
                        <div class="card text-center team-box">
                            <div class="card-body">
                                <div>
                                    <div class="zoom-gallery d-flex flex-wrap">
                                        <a href="assets/images/offers/01.jpg" title="Title Here">
                                            <img src="assets/images/offers/01.jpg" alt="" class="rounded">
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <h5>2016 Clos St. Jean Chateauneuf Du...</h5>
                                    <P class="text-muted mb-0">$29.78</P>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="item">
                        <div class="card text-center team-box">
                            <div class="card-body">
                                <div>
                                    <div class="zoom-gallery d-flex flex-wrap">
                                        <a href="assets/images/offers/01.jpg" title="Title Here">
                                            <img src="assets/images/offers/01.jpg" alt="" class="rounded">
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <h5>2015 Alta Quatreaux </h5>
                                    <P class="text-muted mb-0">$28.88</P>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

@endsection

@section('styles')
    <style type="text/css">

    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".select2").select2({
                allowClear: true,
            });
        });
    </script>

    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            margin:10,
            loop:true,
            autoWidth:true,
            items:4,
            rtl:false,
        });
    </script>
@endsection