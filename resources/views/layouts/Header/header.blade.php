<!-- header-area-start -->
<!-- header-mid-area-start -->
<div class="header-mid-area ptb-40 " style="background-image: url('{{ asset('img/immaginiNostre/headerImage.jpg')}}'); background-size: cover; background-repeat: no-repeat">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5 col-12"></div>
            <div class="col-lg-6 col-md-4 col-12">
                <div class="logo-area text-center logo-xs-mrg">
                    <a href="{{ url('/') }}"><img src="{{ asset('img/logo/VersionePennello/red2.png') }}" width="250px" height="250px" alt="logo" /></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12"> <!-- la parte del carrello è ancora da fare, quindi non la tocco per ora-->
                <div class="row">
                    <div class="my-cart">
                        <ul>
                            <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i>Carrello</a>
                                <span>2</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <br/>
                <div class="row">
                    @if (Route::has('login'))
                        @auth
                            <a class="notification" href="{{ url('/accountArea') }}">
                                <img src="{{ asset('img/immaginiNostre/notifica.png') }}" width="20%", height="20%">
                                @php
                                    $number = \App\Http\Controllers\NotificationController::getNumber(\Illuminate\Support\Facades\Auth::user()->id);
                                @endphp
                                @if($number > 0)
                                    <span>{{ $number }}</span>
                                @endif&nbsp;
                                Notifiche
                            </a>
                        @endauth
                    @endif
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
            <div class="col-lg-1">
                <div class="menu-area">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="menu-area">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">About</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="menu-area">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="menu-area">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Sconti</a>
                        </li>
                    </ul>
                </div>
            </div>
            @if (Route::has('login'))
                @auth
                    <div class="col-lg-1">
                        <div class="menu-area">
                            <ul>
                                <li>
                                    <a href="{{ url('/accountArea') }}">Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pl-10"></div>
                    <div class="col-lg-1">
                        <div class="menu-area">
                            <ul>
                                <li>
                                    <a href="{{ url('/logout') }}">logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pl-20"></div>
                @else
                    <div class="col-lg-1">
                        <div class="menu-area">
                            <ul>
                                <li>
                                    <a href="{{ route('login') }}">Accesso</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if (Route::has('register'))
                        <div class="col-lg-1">
                            <div class="menu-area">
                                <ul>
                                    <li>
                                        <a href="{{ route('register') }}">Registrazione</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pl-40"></div>
                        <div class="pl-40"></div>
                    @endif
                @endauth
            @endif
            <div class="col-lg-5">
                <div id="search" class="header-search">
                    <ul>
                        <li>
                            <form action="{{ route('searchroute') }}">
                                <input type="text" name="search" placeholder="Cerca nello store..." />
                                <a  href="javascript:;" onclick="parentNode.submit();"><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-menu-area-end -->
<!-- header-area-end -->