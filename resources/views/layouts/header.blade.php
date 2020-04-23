<!-- header-area-start -->
    <!-- header-top-area-start -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12"></div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="account-area text-right">
                        <ul>
                            @if (Route::has('login'))
                                    @auth
                                    <li><a href="{{ url('/home') }}">Home</a></li>
                                    @else
                                    <li><a href="{{ route('login') }}">Accesso</a></li>

                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}">Registrazione</a></li>
                                        @endif
                                    @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-top-area-end -->
    <!-- header-mid-area-start -->
    <div class="header-mid-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-12">
                    <div class="header-search">
                        <form action="#">
                            <input type="text" placeholder="Cerca nello store..." />
                            <a href="#"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-12">
                    <div class="logo-area text-center logo-xs-mrg">
                        <a href="{{ url('/') }}"><img src="{{ asset('img/logo/lightBrown.png') }}" width="250px" height="250px" alt="logo" /></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12"> <!-- la parte del carrello è ancora da fare, quindi non la tocco per ora-->
                    <div class="my-cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i>Carrello</a>
                                <span>2</span>
                                <div class="mini-cart-sub">
                                    <div class="cart-product">
                                        <div class="single-cart">
                                            <div class="cart-img">
                                                <a href="#"><img src="img/product/1.jpg" alt="book" /></a>
                                            </div>
                                            <div class="cart-info">
                                                <h5><a href="#">Joust Duffle Bag</a></h5>
                                                <p>1 x £60.00</p>
                                            </div>
                                            <div class="cart-icon">
                                                <a href="#"><i class="fa fa-remove"></i></a>
                                            </div>
                                        </div>
                                        <div class="single-cart">
                                            <div class="cart-img">
                                                <a href="#"><img src="img/product/3.jpg" alt="book" /></a>
                                            </div>
                                            <div class="cart-info">
                                                <h5><a href="#">Chaz Kangeroo Hoodie</a></h5>
                                                <p>1 x £52.00</p>
                                            </div>
                                            <div class="cart-icon">
                                                <a href="#"><i class="fa fa-remove"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-totals">
                                        <h5>Total <span>£12.00</span></h5>
                                    </div>
                                    <div class="cart-bottom">
                                        <a class="view-cart" href="cart.html">view cart</a>
                                        <a href="checkout.html">Check out</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-mid-area-end -->
    <!-- main-menu-area-start -->
    <div class="main-menu-area d-md-none d-none d-lg-block sticky-header-1" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-area">
                        <nav>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="product-details.html">Fumetti<i class="fa fa-angle-down"></i></a>
                                    <div class="mega-menu">
                                        <span>
                                            <a href="#" class="title">Manga</a>
                                            <a href="shop.html">Shonen</a>
                                            <a href="shop.html">Seinen</a>
                                            <a href="shop.html">Shojo</a>
                                            <a href="shop.html">Josei</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">Marvel & DC</a>
                                            <a href="shop.html">Iron man</a><!-- raga ne ho messi alcuni a caso, ovviamente si può modificare-->
                                            <a href="shop.html">Spiderman</a>
                                            <a href="shop.html">Batman</a>
                                            <a href="shop.html">Superman</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">Italians</a>
                                            <a href="shop.html">Bonelli</a><!-- raga ne ho messi alcuni a caso, ovviamente si può modificare-->
                                            <a href="shop.html">Zero Calcare</a>
                                            <a href="shop.html">LaBadessa</a>
                                            <a href="shop.html">Topolino</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">Others</a>
                                            <a href="shop.html">Giapponesi</a>
                                            <a href="shop.html">Americani</a>
                                            <a href="shop.html">Italiani</a>
                                        </span>
                                    </div>
                                </li>
                                <li><a href="#">About Us<i class="fa fa-angle-down"></i></a>
                                    <div class="sub-menu sub-menu-2">
                                        <ul>
                                            <li><a href="my-account.html">About</a></li>
                                            <li><a href="cart.html">contattaci</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="blog.html">blog</a>
                                </li>
                                <li><a href="#">My Account<i class="fa fa-angle-down"></i></a>
                                    <div class="sub-menu sub-menu-2">
                                        <ul>
                                            <li><a href="my-account.html">Account</a></li>
                                            <li><a href="cart.html">carrello</a></li>
                                            <li><a href="wishlist.html">Lista dei desideri</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="safe-area">
                        <a href="product-details.html">sconti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-menu-area-end -->
<!-- header-area-end -->