<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
        <link rel="icon" type="image/png" href="/img/logos/DEP-AID.png">
        <title>
            DEP-AID
        </title>

        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
        <link href="./assets/css/custom.css" rel="stylesheet" />
    </head>
    <body> 
        {{-- <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-lg-3 col-md-4 col-4 text-center">
                    <img src="{{ asset('img/logos/dep-ed.png') }}" height="100">
                </div>
                <div class="col-lg-6 col-md-4 col-4 text-center">
                    <img src="{{ asset('img/logos/DEP-AID.png') }}" height="100">
                </div>
                <div class="col-lg-3 col-md-4 col-4 text-center">
                    <img src="{{ asset('img/logos/deped-malaybalay.jpg') }}" height="100">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card card-frame mt-5 mb-5 w-50 mx-auto" style="background-color: #11ceefb3 !important;">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <h5 class="fw-bold text-center">Thanks for filling out our form!</h5>
                                    <h6 class="fw-bold text-center">We will look over your submitted form and get back to you as soon as possible. Thank you</h6>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <a href={{ route('patient-form') }} class="btn btn-success w-100">Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                                <div class="card card-plain">
                                    <div class="row mt-5 mb-5">
                                        <div class="col-lg-6 col-md-6 col-6 text-center">
                                            <img src="{{ asset('img/logos/dep-ed.png') }}" height="100">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-6 text-center">
                                            <img src="{{ asset('img/logos/DEP-AID.png') }}" height="100">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card card-frame w-100 mx-auto" style="background-color: #11ceefb3 !important;">
                                                <div class="card-body">
                                                    <div class="row mb-5">
                                                        <div class="col-md-12">
                                                            <h5 class="fw-bold text-center">Thanks for filling out our form!</h5>
                                                            <h6 class="fw-bold text-center">We will look over your submitted form and get back to you as soon as possible. Thank you</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col-md-12">
                                                            <a href={{ route('patient-form') }} class="btn btn-success w-100">Back to Home</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                                <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                    style="background-image: url('img/medical.svg');
                  background-size: cover;">
                                    {{-- background-image: url('img/medical.svg') --}}
                                    <span class="mask opacity-6"></span>
                                    {{-- <h4 class="mt-5 text-white font-weight-bolder position-relative">DEP-AID</h4>
                                    <p class="text-white position-relative">MALAYBALAY CITY DIVISION</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
