<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 
    <!-- Title -->
    <title>Event Management System &amp; EZevent</title>

    <!-- Favicon -->
    <link rel="icon" href="img/title.PNG">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="dorne-load"></div>
    </div>

   
    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">

            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ url('/') }}"><img src="img/homelogo.png" alt="" style="width:120px; height:74px"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/event') }}">Events</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/about') }}">About Us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                                </li>
                            </ul>
                            

                             @guest

                            <div class="dorne-signin-btn">
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>

                            <div class="dorne-add-listings-btn">
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </div>
                            <!-- Register btn -->
                            @else

                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Profile Settings') }}
										</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Change Password') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
										</form>

                                    </div>
                                </li>

                            @endguest

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(img/poll.jpg);width:100%;height:180%;">
        
            @yield('content')


    </section>
    <!-- ***** Welcome Area End ***** -->


    <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
            <footer class="page-footer font-small mdb-color pt-4">


                    <!-- Footer Links -->
                    <div class="container text-center text-md-left">

                      <!-- Footer links -->
                      <div class="row text-center text-md-left mt-3 pb-3">

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                          <h6 class=" mb-4 font-weight-bold">EZevent</h6>
                          
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none">

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                          <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                          <p>
                            <a href="#!">MDBootstrap</a>
                          </p>
                          <p>
                            <a href="#!">MDWordPress</a>
                          </p>
                          <p>
                            <a href="#!">BrandFlow</a>
                          </p>
                          <p>
                            <a href="#!">Bootstrap Angular</a>
                          </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none">

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                          <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
                          <p>
                            <a href="#!">Your Account</a>
                          </p>
                          <p>
                            <a href="#!">Become an Affiliate</a>
                          </p>
                          <p>
                            <a href="#!">Shipping Rates</a>
                          </p>
                          <p>
                            <a href="#!">Help</a>
                          </p>
                        </div>

                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none">

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                          <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                          <p>
                                <img src="img/address.png" alt="" style="width:30px; height:30px;"> No 97/4, Katubadda, Moratuwa</p>
                          <p>
                                <img src="img/email.png" alt="" style="width:20px; height:20px;"> ezevent@gmail.com</p>
                          <p>
                                <img src="img/phone.png" alt="" style="width:20px; height:20px;"> +94 775641982</p>
                          <p>
                                <img src="img/land.png" alt="" style="width:30px; height:30px;"> 011 5246985</p>
                        </div>
                        <!-- Grid column -->

                      </div>
                      <!-- Footer links -->

                      <hr>

                      <!-- Grid row -->
                      <div class="row d-flex align-items-center">

                        <!-- Grid column -->
                        <div class="col-md-7 col-lg-8">

                          <!--Copyright-->
                          <p class="text-center text-md-left">
                            <a href="https://mdbootstrap.com/education/bootstrap/">
                              <strong> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</strong>
                            </a>
                          </p>

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-5 col-lg-4 ml-lg-0">

                          <!-- Social buttons -->
                          <div class="text-center text-md-right">
                            <ul class="list-unstyled list-inline">
                              <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                  <i class="fa fa-facebook"></i>
                                </a>
                              </li>
                              <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                  <i class="fa fa-twitter"></i>
                                </a>
                              </li>
                              <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                  <i class="fa fa-behance"></i>
                                </a>
                              </li>
                              <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                  <i class="fa fa-linkedin"></i>
                                </a>
                              </li>
                            </ul>
                          </div>

                        </div>
                        <!-- Grid column -->

                      </div>
                      <!-- Grid row -->

                    </div>
                    <!-- Footer Links -->

                  </footer>
    </footer>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>
