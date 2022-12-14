<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Shayna Template" />
    <meta name="keywords" content="Shayna, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>KPN-SEGAR</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" />
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i> kpnbarombong@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i> +628 22081996
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">

                    <div class="col-lg-7 col-md-7"></div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                Keranjang Belanja &nbsp;
                                <a href="{{ route('keranjang.index') }}">
                                    <i class="icon_bag_alt"></i>
                                    @php
                                        $keranjang = \App\Models\Keranjang::where('user_id', Auth::user()->id)->get();
                                    @endphp
                                    <span>{{ $keranjang->count() }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
          <!-- Breadcrumb Section Begin -->
          <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="breadcrumb-text product-more">
                            <a href="{{ route('Customer.Index') }}"><i class="fa fa-home"></i> Home</a>
                            <a href="{{ route('Customer.allproduk') }}"><i class="fa fa-shopping-bag"></i>
                                Produk</a>
                            <a href="{{ route('Customer.potongan') }}"><i class="fa fa-credit-card"></i> Promo</a>
                            <a href="{{ route('Customer.Index') }}"><i class="fa fa-info-circle"></i> Tentang
                                Kami</a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="breadcrumb-text product-more">
                            @cannot('Anggota')
                            <a href="{{ route('dashboardUser') }}"> <i class="fa fa-home"></i> Dashboard</a>
                            <a href="{{ route('daftar-anggota') }}"> <i class="fa fa-id-card"></i>  Daftar Anggota</a>
                            @endcannot
                            @can('Anggota')
                            <a href="{{ route('index-anggota') }}"> <i class="fa fa-id-card"></i>  Dashboard Anggota</a>

                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->

    </header>
    <!-- Header End -->
    @include('sweetalert::alert')
    @yield('content')
    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/logo_website_shayna_white.png" alt="" /></a>
                        </div>
                        <ul>
                            <li>Address: Setra Duta, Bandung</li>
                            <li>Phone: +628 22081996</li>
                            <li>Email: hello.shayna@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | Shayna
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
