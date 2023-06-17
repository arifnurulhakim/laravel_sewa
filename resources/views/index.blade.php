<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Payna - Minimal eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/themify.css">
    <!-- othres CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/plugins/easyzoom.css">
    <link rel="stylesheet" href="assets/css/plugins/select2.min.css">
    <!-- Revolution Slider CSS -->
    <link rel="stylesheet" href="assets/js/revolution/css/settings.css">
    <link rel="stylesheet" href="assets/js/revolution/css/navigation.css">
    <link rel="stylesheet" href="assets/js/revolution/custom-setting.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <div class="main-wrapper main-wrapper-2">
        <header class="header-area header-padding-1">
            <div class="main-header-wrap transparent-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="logo-header-about-wrap white-header">
                                <div class="logo logo-width">
                                    <a href="index.html"><img src="assets/images/logo/logo-white.png" alt="logo"></a>
                                </div>
                                <div class="header-about-icon ml-35">
                                    <a class="quickinfo-button-active" href="#"><i class=" ti-align-left "></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center">
                            <div class="main-menu menu-lh-1 menu-white">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="index.html">Home</a>
                                        </li>
                                        <li><a href="#new-trend-area" onclick="scrollToSection(event)">Sewa</a></li>
                                        <li><a href="shop-fullwide.html">Collections</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="lang-cart-search-wrap">
                                <div class="same-style header-search white-search">
                                    <a class="search-active" href="#"><i class="ti-search"></i></a>
                                </div>
                                <div class="same-style cart-wrap ml-20 white-cart">
                                    <a href="#" class="cart-active">
                                        <i class="ti-shopping-cart"></i>
                                        <span class="count-style">2</span>
                                    </a>
                                </div>
                                <div class="same-style login-register ml-20 white-login main-menu menu-lh-1 menu-white">
                                    <a href="{{route('login')}}" class="login-register-button">
                                        <i class="fa fa-user"></i>
                                       
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="header-small-mobile header-small-mobile-ptb">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mobile-logo logo-width">
                                <a href="index.html">
                                    <img alt="" src="assets/images/logo/logo.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mobile-header-right-wrap">
                                <div class="same-style cart-wrap">
                                    <a href="#" class="cart-active">
                                        <i class=" ti-shopping-cart "></i>
                                        <span class="count-style">2</span>
                                    </a>
                                </div>
                                <div class="mobile-off-canvas">
                                    <a class="mobile-aside-button" href="#"><i class=" ti-align-left "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="quickinfo-wrapper-active quickinfo-toggle-left">
            <a class="quickinfo-close"><i class=" ti-close"></i></a>
            <div class="quickinfo-wrap">
                <div class="quickinfo-menu">
                    <nav>
                        <ul>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="quickinfo-banner default-overlay">
                    <a href="#"><img src="assets/images/banner/quick-info-banner.jpg" alt="quick-info"></a>
                    <div class="quickinfo-banner-content">
                        <h3>new</h3>
                    </div>
                </div>
                <div class="quickinfo-address">
                    <ul>
                        <li>(+612) 2531 5600 </li>
                        <li><a href="#">info@example.com </a></li>
                        <li>PO Box 1622 Colins Street West <br>Victoria 8077 Australia</li>
                    </ul>
                </div>
                <div class="quickinfo-map-link">
                    <a href="#">Google map</a>
                </div>
                <div class="quickinfo-social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="quickinfo-payment">
                    <img src="assets/images/icon-img/payment-info.png" alt="payment">
                </div>
                <div class="quickinfo-copyright">
                    <p>© 2019 <a href="#">Payna</a> Shop. All rights reserved</p>
                </div>
            </div>
        </div>
        <div class="mobile-off-canvas-active">
            <a class="mobile-aside-close"><i class="ti-close"></i></a>
            <div class="header-mobile-aside-wrap">
                <div class="mobile-search">
                    <form class="search-form" action="#">
                        <input type="text" placeholder="Search entire store…">
                        <button class="button-search"><i class="ti-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap">
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="index.html">Home</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="#">Demo Group 01</a>
                                            <ul class="dropdown">
                                                <li><a href="index.html">Home 01</a></li>
                                                <li><a href="index-2.html">Home 02</a></li>
                                                <li><a href="index-3.html">Home 03</a></li>
                                                <li><a href="index-4.html">Home 04</a></li>
                                                <li><a href="index-5.html">Home 05</a></li>
                                                <li><a href="index-6.html">Home 06</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Demo Group 02</a>
                                            <ul class="dropdown">
                                                <li><a href="index-7.html">Home 07</a></li>
                                                <li><a href="index-8.html">Home 08</a></li>
                                                <li><a href="index-9.html">Home 09</a></li>
                                                <li><a href="index-10.html">Home 10</a></li>
                                                <li><a href="index-11.html">Home 11</a></li>
                                                <li><a href="index-12.html">Home 12</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Demo Group 03</a>
                                            <ul class="dropdown">
                                                <li><a href="index-13.html">Home 13</a></li>
                                                <li><a href="index-14.html">Home 14</a></li>
                                                <li><a href="index-15.html">Home 15</a></li>
                                                <li><a href="index-16.html">Home 16</a></li>
                                                <li><a href="index-17.html">Home 17</a></li>
                                                <li><a href="index-18.html">Home 18</a></li>
                                                <li><a href="index-19.html">Home 19</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="shop-fullwide.html">shop</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="#">Shop Layout</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-fullwide.html">Shop Fullwidth</a></li>
                                                <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                                <li><a href="shop-3col.html">Shop 03 Column</a></li>
                                                <li><a href="shop-4col.html">Shop 04 Column</a></li>
                                                <li><a href="shop-masonry.html">Shop Mansory</a></li>
                                                <li><a href="shop-metro.html">Shop Metro Layout</a></li>
                                                <li><a href="shop-instagram.html">Shop Instagram</a></li>
                                                <li><a href="shop-collection-classic.html">Collection Classic</a></li>
                                                <li><a href="shop-collection-modern.html">Collection Modern</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Product Layout</a>
                                            <ul class="dropdown">
                                                <li><a href="product-details.html">Simple 01</a></li>
                                                <li><a href="product-details-2.html">Simple 02</a></li>
                                                <li><a href="product-details-3.html">Simple 03</a></li>
                                                <li><a href="product-details-carousel.html">Product Carousel</a></li>
                                                <li><a href="product-details-grouped.html">Product Grouped</a></li>
                                                <li><a href="product-details-affiliate.html">Product Affiliate</a></li>
                                                <li><a href="product-details-configurable.html">Product Configurable</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Shop Page </a>
                                            <ul class="dropdown">
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                <li><a href="checkout.html">Check Out</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="compare.html">Compare</a></li>
                                                <li><a href="order-tracking.html">Order Tracking</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="contact-us.html">Contact Us</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="comming-soon.html">Comming Soon</a></li>
                                        <li><a href="404.html">Page 404</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="blog.html">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog.html">Blog Sidebar</a></li>
                                        <li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                                        <li><a href="blog-3col.html">Blog 03 Columns</a></li>
                                        <li><a href="blog-masonry.html">Blog Mansory</a></li>
                                        <li class="menu-item-has-children"><a href="#">Single Post</a>
                                            <ul class="dropdown">
                                                <li><a href="blog-details.html">Single Post 01</a></li>
                                                <li><a href="blog-details-2.html">Single Post 02</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-curr-lang-wrap">
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-language-active" href="#">Language <i class="fa fa-angle-down"></i></a>
                        <div class="lang-curr-dropdown lang-dropdown-active">
                            <ul>
                                <li><a href="#">English (US)</a></li>
                                <li><a href="#">English (UK)</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-currency-active" href="#">Currency <i class="fa fa-angle-down"></i></a>
                        <div class="lang-curr-dropdown curr-dropdown-active">
                            <ul>
                                <li><a href="#">USD</a></li>
                                <li><a href="#">EUR</a></li>
                                <li><a href="#">Real</a></li>
                                <li><a href="#">BDT</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-account-active" href="#">My Account <i class="fa fa-angle-down"></i></a>
                        <div class="lang-curr-dropdown account-dropdown-active">
                            <ul>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Creat Account</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-social-wrap">
                    <a class="facebook" href="#"><i class="ti-facebook"></i></a>
                    <a class="twitter" href="#"><i class="ti-twitter-alt"></i></a>
                    <a class="pinterest" href="#"><i class="ti-pinterest"></i></a>
                    <a class="instagram" href="#"><i class="ti-instagram"></i></a>
                    <a class="google" href="#"><i class="ti-google"></i></a>
                </div>
            </div>
        </div>
        <!-- search start -->
        <div class="search-content-wrap main-search-active">
            <a class="search-close"><i class=" ti-close "></i></a>
            <div class="search-content">
                <p>Start typing and press Enter to search</p>
                <form class="search-form" action="#">
                    <input type="text" placeholder="Search">
                    <button class="button-search"><i class="ti-search"></i></button>
                </form>
            </div>
        </div>
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class=" ti-close"></i></a>
                <div class="cart-content">
                    <h3>Shopping Cart</h3>
                    <ul>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="assets/images/cart/cart-1.jpg" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">High Collar Jacket</a></h4>
                                <span>1 × $50.00</span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="assets/images/cart/cart-2.jpg" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Long shirt dress</a></h4>
                                <span>2 × $29.00</span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                    </ul>
                    <div class="cart-total">
                        <h4>Subtotal: <span>$150.00</span></h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="btn-hover cart-btn-style" href="cart.html">view cart</a>
                        <a class="no-mrg btn-hover cart-btn-style" href="checkout.html">checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-area">
            <div id="rev_slider_5_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="home-04" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.4.7 auto mode -->
                <div id="rev_slider_5_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
                    <ul>
                        <!-- SLIDE  -->
                        <li data-index="rs-13" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="assets/images/slider/img-slide4-01.jpg" alt="" data-bgposition="center center !important" data-bgfit="cover !important" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption     rev_group" id="slide-13-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="['887','887','687','370']" data-height="['227','227','180','280']" data-whitespace="nowrap" data-type="group" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; min-width: 887px; max-width: 887px; max-width: 227px; max-width: 227px; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption   tp-resizeme" id="slide-13-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" data-fontsize="['24','24','18','18']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":"+690","speed":1650,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 24px; line-height: 30px; font-weight: 400; color: #ffffff; letter-spacing: 5px;font-family:Playfair Display;">WELCOME TO </div>

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption   tp-resizeme" id="slide-13-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-20','-20','-20','-20']" data-fontsize="['60','60','40','40']" data-lineheight="['70','70','70','60']" data-width="['none','none','none','370']" data-height="['none','none','none','141']" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":"+940","speed":1650,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 60px; line-height: 70px; font-weight: 400; color: #ffffff; letter-spacing: 5px;font-family:Playfair Display;">TEMPAT SEWA</div>

                                <!-- LAYER NR. 4 -->
                               
                            </div>
                        </li>
                        <!-- SLIDE  -->
                    </ul>
                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                </div>
            </div><!-- END REVOLUTION SLIDER -->
        </div>
        <div class="banner-area pt-100 pb-95">
        <div id="new-trend-area" class="new-trend-area section-padding-2 pb-45">
              <div class="container-fluid padding-30-row-col">
                  <div class="section-title-3 text-center mb-70">
                      <h2>Barang Barang</h2>
                  </div>
                  <div class="row">
                      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                          <div class="product-wrap mb-55">
                              <div class="product-img default-overlay mb-20">
                                  <a href="product-details.html">
                                      <img class="default-img" src="assets/images/product/hm-4-pro-1.jpg" alt="">
                                      <img class="hover-img" src="assets/images/product/hm-4-pro-1-2.jpg" alt="">
                                  </a>
                                  <div class="product-action">
                                      <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-zoom-in"></i><span>Quick Shop</span></a>
                                  </div>
                                  <div class="product-action-2">
                                      <a title="Buy on Themeforest" href="#">Buy on Themeforest</a>
                                  </div>
                              </div>
                              <div class="product-content">
                                  <h3><a href="product-details.html">Wrap soft fabric blouse</a></h3>
                                  <div class="product-price">
                                      <span>$29.00</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>

        <div class="feature-area bg-gray-2 pt-70 pb-40">
            <div class="custom-container-3">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="feature-wrap mb-30">
                            <div class="feature-icon f-icon-roted">
                                <i class="ti-shopping-cart"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Freeshiping & Return</h4>
                                <span>A Free shipping is available for orders more than $100</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="feature-wrap mb-30">
                            <div class="feature-icon">
                                <i class=" ti-headphone-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Hotline: (+55) 862.862.995</h4>
                                <span>Professional Support , We always here to help you 24/7</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="feature-wrap mb-30">
                            <div class="feature-icon">
                                <i class=" ti-lock"></i>
                            </div>
                            <div class="feature-content">
                                <h4> Order Protection </h4>
                                <span>Secure payment, confidentiality of payment information</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-area section-padding-1 bg-black pt-70">
            <div class="container-fluid">
                <div class="row">
                    <div class="footer-column footer-width-32">
                        <div class="footer-widget mb-40">
                            <div class="footer-about">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/images/logo/logo-white.png" alt="logo"></a>
                                </div>
                                <div class="footer-info">
                                    <ul>
                                        <li><a href="#"> info@example.com </a></li>
                                        <li> +54.854.854.6666 </li>
                                        <li> 035 Virginia Plaza Suite 331 </li>
                                    </ul>
                                </div>
                                <div class="footer-social">
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column footer-width-12">
                        <div class="footer-widget mb-40">
                            <div class="footer-title">
                                <h3>COMPANY</h3>
                            </div>
                            <div class="footer-list">
                                <ul>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Gift voucher</a></li>
                                    <li><a href="#">Affiliate</a></li>
                                    <li><a href="#">Work for Payna</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column footer-width-12">
                        <div class="footer-widget mb-40">
                            <div class="footer-title">
                                <h3>USERFUL</h3>
                            </div>
                            <div class="footer-list">
                                <ul>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Press</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column footer-width-12">
                        <div class="footer-widget mb-40">
                            <div class="footer-title">
                                <h3>QUICKLINKS</h3>
                            </div>
                            <div class="footer-list">
                                <ul>
                                    <li><a href="#">The Collections</a></li>
                                    <li><a href="#">Size Guide</a></li>
                                    <li><a href="compare.html">Compare</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="wishlist.html">My Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column footer-width-31">
                        <div class="footer-widget subscribe-right mb-40">
                            <div class="footer-title">
                                <h3>JOIN OUR NEWSLETTER</h3>
                            </div>
                            <div id="mc_embed_signup" class="subscribe-form mt-20">
                                <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="https://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input class="email" type="email" required="" placeholder="Enter your email address..." name="EMAIL" value="">
                                        <div class="mc-news" aria-hidden="true">
                                            <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                        </div>
                                        <div class="clear">
                                            <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright text-center pt-25 pb-10">
                    <p>© Payna Store All rights reserved </p>
                </div>
            </div>
        </footer>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-slider-active owl-carousel">
                                    <img src="assets/images/product/quickview-1.jpg" alt="">
                                    <img src="assets/images/product/quickview-2.jpg" alt="">
                                </div>
                                <!-- Thumbnail Large Image End -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>High Collar Jacket</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra</p>
                                        <ul>
                                            <li>Composition: 50% cotton,45% polyester, 5% polyamide.</li>
                                            <li>Filling: 100% polyester.</li>
                                            <li>Hood fur: 64% acrylic,23% modacrylic,13% polyester</li>
                                        </ul>
                                    </div>
                                    <div class="quickview-action-wrap">
                                        <div class="quickview-quality">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                            </div>
                                        </div>
                                        <div class="quickview-cart">
                                            <a title="Add to cart" href="#">Add to cart</a>
                                        </div>
                                        <div class="quickview-wishlist">
                                            <a title="Add to wishlist" href="#"><i class=" ti-heart "></i></a>
                                        </div>
                                        <div class="quickview-compare">
                                            <a title="Add to compare" href="#"><i class="ti-bar-chart-alt"></i></a>
                                        </div>
                                    </div>
                                    <div class="quickview-meta">
                                        <span>SKU: <span>REF. LA-103</span></span>
                                        <span>Categories: <a href="#">Fashions</a>, <a href="#">Main 03</a></span>
                                        <span>Tags: <a href="#">Coat</a>, <a href="#">Dresses</a>, <a href="#">Fashion</a></span>
                                    </div>
                                    <div class="default-social">
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/jquery-v3.6.0.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!-- Revolution Slider JS -->
    <script src="assets/js/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="assets/js/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/js/revolution/revolution-active.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="assets/js/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="assets/js/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="assets/js/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/js/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="assets/js/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/js/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="assets/js/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="assets/js/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="assets/js/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <!-- Others JS -->
    <script src="assets/js/plugins/instafeed.js"></script>
    <script src="assets/js/plugins/jquery-ui.js"></script>
    <script src="assets/js/plugins/jquery-ui-touch-punch.js"></script>
    <script src="assets/js/plugins/magnific-popup.js"></script>
    <script src="assets/js/plugins/owl-carousel.js"></script>
    <script src="assets/js/plugins/slick.js"></script>
    <script src="assets/js/plugins/parallax.js"></script>
    <script src="assets/js/plugins/paraxify.js"></script>
    <script src="assets/js/plugins/countdown.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/images-loaded.js"></script>
    <script src="assets/js/plugins/isotope.js"></script>
    <script src="assets/js/plugins/easyzoom.js"></script>
    <script src="assets/js/plugins/sticky-sidebar.js"></script>
    <script src="assets/js/plugins/tilt.js"></script>
    <script src="assets/js/plugins/select2.min.js"></script>
    <script src="assets/js/plugins/wow.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script>
function scrollToSection(event) {
    event.preventDefault();
    const target = document.querySelector(event.target.getAttribute('href'));
    const targetPosition = target.offsetTop;
    const startPosition = window.pageYOffset;
    const distance = targetPosition - startPosition;
    const duration = 1000; // Durasi animasi dalam milidetik
    let start = null;

    function step(timestamp) {
        if (!start) start = timestamp;
        const progress = timestamp - start;
        window.scrollTo(0, easeInOutCubic(progress, startPosition, distance, duration));
        if (progress < duration) {
            window.requestAnimationFrame(step);
        }
    }

    function easeInOutCubic(t, b, c, d) {
        t /= d/2;
        if (t < 1) return c/2*t*t*t + b;
        t -= 2;
        return c/2*(t*t*t + 2) + b;
    }

    window.requestAnimationFrame(step);
}

    </script>
}


</body>

</html>