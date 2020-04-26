<!-- header-area-start -->
    <!-- header-mid-area-end -->
<!-- header-mid-area-start -->
<div class="header-mid-area ptb-40 " style="background-image: url('{{ asset('img/download.jpg')}}'); background-size: 100%; background-repeat: no-repeat; ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5 col-12"></div>
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
    <!-- main-menu-area-start -->
    <div class="main-menu-area d-md-none d-none d-lg-block sticky-header-1" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-area">
                        <nav>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="blog.html">blog</a></li>
                                <li><a href="product-details.html">sconti</a></li>
                                @if (Route::has('login'))
                                    @auth
                                        <li><a href="{{ url('/home') }}">MyAccount</a>
                                            <div class="sub-menu sub-menu-2">
                                                <ul>
                                                    <li><a href="my-account.html">Account</a></li>
                                                    <li><a href="cart.html">carrello</a></li>
                                                    <li><a href="wishlist.html">Lista dei desideri</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    @else
                                        <li><a href="{{ route('login') }}">Accesso</a></li>

                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}">Registrazione</a></li>
                                        @endif
                                    @endauth
                                @endif
                                <li>
                                    <div class="header-search">
                                        <form action="#">
                                            <input type="text" placeholder="Cerca nello store..." />
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-menu-area-end -->

<!-- header-area-end -->