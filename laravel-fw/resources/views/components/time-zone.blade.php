<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" href="https://asahome.vn/wp-content/uploads/2018/07/icon-16.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="/time-zone/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/time-zone/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/time-zone/assets/css/flaticon.css">
    <link rel="stylesheet" href="/time-zone/assets/css/slicknav.css">
    <link rel="stylesheet" href="/time-zone/assets/css/animate.min.css">
    <link rel="stylesheet" href="/time-zone/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/time-zone/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/time-zone/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/time-zone/assets/css/slick.css">
    <link rel="stylesheet" href="/time-zone/assets/css/nice-select.css">
    <link rel="stylesheet" href="/time-zone/assets/css/style.css">
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="/time-zone/assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <!-- Header Start -->
    <header>
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/index"><img src="/time-zone/assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="/index">Home</a></li>
                                    <li><a href="/shop">shop</a></li>
                                    <li><a href="/about">about</a></li>
                                    <li class="hot"><a href="#">Latest</a>
                                        <ul class="submenu">
                                            <li><a href="/shop">Product list</a></li>
                                            <!-- <li><a href="/product-details"> Product Details</a></li> -->
                                        </ul>
                                    </li>
                                    <li><a href="#">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="#">Blog</a></li>
                                            <!-- <li><a href="/blog-details">Blog Details</a></li> -->
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul class="submenu">
                                            <!-- <li><a href="/login-shop">Login</a></li> -->
                                            <li><a href="/cart">Cart</a></li>
                                            <!-- <li><a href="/elements">Element</a></li>
                                            <li><a href="/confirmation">Confirmation</a></li> -->
                                            <li><a href="/checkout">Product Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <span class="flaticon-search"></span>
                                    </div>
                                </li>
                                <li> <a href="/login"><span class="flaticon-user"></span></a></li>
                                <li><a href="/cart"><i style="color: black;" class="fas fa-shopping-cart">[<span style="padding: 0px 0px;" class="cart-quantity">{{ showCartQuantity() }}</span>]</i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- main -->
    {{ $slot }}

    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index"><img src="time-zone/assets/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>Asorem ipsum adipolor sdit amet, consectetur adipisicing elitcf sed do eiusmod tem.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#"> Offers & Discounts</a></li>
                                    <li><a href="#"> Get Coupon</a></li>
                                    <li><a href="#"> Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>New Products</h4>
                                <ul>
                                    <li><a href="#">Woman Cloth</a></li>
                                    <li><a href="#">Fashion Accessories</a></li>
                                    <li><a href="#"> Man Accessories</a></li>
                                    <li><a href="#"> Rubber made Toys</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Frequently Asked Questions</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Report a Payment Issue</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer bottom -->
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="time-zone/https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="/time-zone/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="/time-zone/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/time-zone/assets/js/popper.min.js"></script>
    <script src="/time-zone/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="/time-zone/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="/time-zone/assets/js/owl.carousel.min.js"></script>
    <script src="/time-zone/assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="/time-zone/assets/js/wow.min.js"></script>
    <script src="/time-zone/assets/js/animated.headline.js"></script>
    <script src="/time-zone/assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="/time-zone/assets/js/jquery.scrollUp.min.js"></script>
    <script src="/time-zone/assets/js/jquery.nice-select.min.js"></script>
    <script src="/time-zone/assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="/time-zone/assets/js/contact.js"></script>
    <script src="/time-zone/assets/js/jquery.form.js"></script>
    <script src="/time-zone/assets/js/jquery.validate.min.js"></script>
    <script src="/time-zone/assets/js/mail-script.js"></script>
    <script src="/time-zone/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="/time-zone/assets/js/plugins.js"></script>
    <script src="/time-zone/assets/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            Object.size = function(obj) {
                var size = 0,
                    key;
                for (key in obj) {
                    if (obj.hasOwnProperty(key)) size++;
                }
                return size;
            };
        });
    </script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    @yield('script')
</body>

</html>