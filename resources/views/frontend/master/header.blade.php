<!--header -->
<div class="colorlib-loader"></div>
<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="colorlib-logo"><a href="">Fashion Store</a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li @yield('home')><a href="">Trang chủ</a></li>
                            <li class="has-dropdown @yield('shop')">
                                <a href="product">Cửa hàng</a>
                                <ul class="dropdown">
                                    <li><a href="product/cart">Giỏ hàng</a></li>
                                    <li><a href="product/checkout">Thanh toán</a></li>

                                </ul>
                            </li>
                            <li @yield('about')><a href="about">Giới thiệu</a></li>
                            <li @yield('contact')><a href="contact">Liên hệ</a></li>
                            <li @yield('cart')><a href="product/cart"><i class="icon-shopping-cart"></i> Giỏ hàng [@if(Cart::content()) {{ count(Cart::content()) }} @else 0 @endif]</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero">
        <div class="flexslider">
            <ul class="slides">
                <li style="background-image: url(public/frontend/images/img_bg_1.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1 class="head-1">Sale</h1>
                                        <h2 class="head-3">45%</h2>
                                        <p class="category"><span>Nhưng mẫu thiết kế chuyên nghiệp</span></p>
                                        <p><a href="" class="btn btn-primary">Kết nối với shop</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(public/frontend/images/img_bg_2.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1 class="head-1">Sale</h1>
                                        <h2 class="head-3">45%</h2>
                                        <p class="category"><span>Nhưng mẫu thiết kế chuyên nghiệp</span></p>
                                        <p><a href="#" class="btn btn-primary">Kết nối với shop</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(public/frontend/images/img_bg_3.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1 class="head-1">Sale</h1>
                                        <h2 class="head-3">45%</h2>
                                        <p class="category"><span>Nhưng mẫu thiết kế chuyên nghiệp</span></p>
                                        <p><a href="/" class="btn btn-primary">Kết nối với shop</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <!-- End header -->
