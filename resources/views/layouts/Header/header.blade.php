<!-- header-area-start -->
<!-- header-mid-area-start -->
<div class="header-mid-area mb-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-4 col-12">
                <div class="logo-area logo-xs-mrg">
                    <a href="{{ url('/') }}"><img src="{{ asset('img/logo/iconaDGD.png') }}" width="250px" height="250px" alt="logo" /></a>
                </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-0-5">
                <div class="row">
                    <div class="my-cart" style="alignment: right; margin-top: 11px">
                            <ul>
                                @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                    @if(Auth::user()->hasGroup('il gruppo degli admin'))
                                    @else
                                        <li><a href="{{url('/accountArea/wishlist')}}"><i class="fa fa-shopping-bag" style="padding: 0px"></i></a>
                                    @endif
                                @else
                                    <li><a href="{{url('/login')}}"><i class="fa fa-shopping-bag" style="padding: 0px"></i></a>
                                        @endif
                                    </li>
                            </ul>
                    </div>
                </div>
            </div>
            <div class="ml-4"></div>
            <div class="col-lg-0-5">
                <div class="row">
                    <div class="my-cart" style="alignment: right; margin-top: 11px">
                        <ul>
                            @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                @if(Auth::user()->hasGroup('il gruppo degli admin'))
                                    <li> <a href="{{url('/adminArea/dashboard')}}"><i class="fa fa-user" style="padding: 0px"></i></a>
                                        <div class="mini-cart-sub">
                                            <div class="cart-product">
                                                <div class="single-cart">
                                                    <div class="cart-info">
                                                        <h5><a href="{{url('/adminArea/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></h5>
                                                    </div>
                                                </div>
                                                <div class="single-cart">
                                                    <div class="cart-info">
                                                        <h5><a href="{{url('/adminArea/users')}}"><i class="fa fa-user"> Gestione Utenti</i> </a></h5>
                                                    </div>
                                                </div>
                                                <div class="single-cart">
                                                    <div class="cart-info">
                                                        <h5><a href="{{url('/adminArea/comics')}}"><i class="fa fa-book"> Gestione Fumetti</i></a></h5>
                                                    </div>
                                                </div>
                                                <div class="single-cart">
                                                    <div class="cart-info">
                                                        <h5><a href="{{url('/adminArea/reviews')}}"><i class="fa fa-map-marker"></i> Gestione Recensione</a></h5>
                                                    </div>
                                                </div>
                                                <div class="single-cart">
                                                    <div class="cart-info">
                                                        <h5><a href="{{url('/adminArea/articles')}}"><i class="fa fa-pencil"></i> Gestione Articoli</a></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li> <a href="{{url('/accountArea/dashboard')}}"><i class="fa fa-user" style="padding: 0px"></i></a>
                                        @php
                                            $user = Auth::user();
                                            $isVendor = \App\Http\Controllers\GroupController::isVendor($user->id);
                                        @endphp
                                        <div class="mini-cart-sub">
                                            <div class="cart-product">
                                                <div class="single-cart">
                                                    <div class="cart-info">
                                                        <h5><a href="{{url('/accountArea/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></h5>
                                                    </div>
                                                </div>
                                                <div class="single-cart">
                                                    <div class="cart-info">
                                                        <h5><a href="{{url('/accountArea/orders')}}"><i class="fa fa-cart-arrow-down"></i> I miei ordini</a></h5>
                                                    </div>
                                                </div>
                                                <div class="single-cart">
                                                    <div class="cart-info">
                                                        <h5><a href="{{url('/accountArea/paymentmethods')}}"><i class="fa fa-credit-card"></i> Metodi Di pagamento</a></h5>
                                                    </div>
                                                </div>
                                                <div class="single-cart">
                                                    <div class="cart-info">
                                                        <h5><a href="{{url('/accountArea/addressedit')}}"><i class="fa fa-map-marker"></i> Gestisci Indirizzo</a></h5>
                                                    </div>
                                                </div>
                                                <div class="single-cart">
                                                    <div class="cart-info">
                                                        <h5><a href="{{url('/accountArea/account')}}"><i class="fa fa-user"></i> Account</a></h5>
                                                    </div>
                                                </div>
                                                @if($isVendor)
                                                    <div class="single-cart">
                                                        <div class="cart-info">
                                                            <h5><a href="{{url('/accountArea/venditore')}}"><i class="fa fa-dollar"></i> Gestione Ordini</a></h5>
                                                        </div>
                                                    </div>
                                                    <div class="single-cart">
                                                        <div class="cart-info">
                                                            <h5><a href="{{url('/accountArea/menagementproducts')}}"><i class="fa fa-bookmark"></i> Gestione Fumetti</a></h5>
                                                        </div>
                                                    </div>
                                                    <div class="single-cart">
                                                        <div class="cart-info">
                                                            <h5><a href="{{url('/accountArea/venditoreaddproducts')}}"><i class="fa fa-book"></i> Vendi un Fumetto</a></h5>
                                                        </div>
                                                    </div>
                                                  @endif
                                            </div>
                                        </div>
                                    </li>
                            @endif
                            @else
                                <li><a href="{{url('/login')}}"><i class="fa fa-user" style="padding: 0px"></i></a>
                                    @endif
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ml-3"></div>
            <div class="col-lg-0-5"> <!-- la parte del carrello è ancora da fare, quindi non la tocco per ora-->
                <div class="row">
                    <div class="my-cart" style="alignment: right; margin-top: 11px">
                        <ul>
                            @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                @if(Auth::user()->hasGroup('il gruppo degli admin'))

                                @else
                                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart" style="padding: 0px"></i></a>
                                    @php($quantityCart = 0)
                                    @if(session('cart'))
                                        @php($cart = session()->get('cart'))
                                        @php($sessions = \Illuminate\Support\Facades\DB::table('sessions')->get())
                                        @foreach($sessions as $session)
                                            @php($user = \Illuminate\Support\Facades\Auth::user())
                                            @if($cart[$session->sessionId]['user'] == $user->id)
                                                @php($quantityCart++)
                                            @endif
                                        @endforeach
                                    @endif
                                    @if($quantityCart > 0)
                                        @php($total = 0)
                                        <span>{{ $quantityCart }}</span>
                                        <div class="mini-cart-sub">
                                            <div class="cart-product">
                                                @php($tmp =0)
                                                @php($user = \Illuminate\Support\Facades\Auth::user())
                                                @php($sessions = \Illuminate\Support\Facades\DB::table('sessions')->get())
                                                @php($cart = session()->get('cart'))
                                                @foreach($sessions as $session)
                                                    @if($cart[$session->sessionId]['user'] == $user->id)
                                                        @php($total += $cart[$session->sessionId]['price'] * $cart[$session->sessionId]['quantity'])
                                                        @if ($tmp++ < 5)
                                                            @php($comic = \App\Http\Controllers\ComicController::getByID($cart[$session->sessionId]['comic_id']))
                                                            <div class="single-cart">
                                                                <div class="cart-img">
                                                                    <a href="{{ url('/comic_detail/'.$comic->id) }}"><img src="{{asset('img/comicsImages/' . $cart[$session->sessionId]['image']) }}" alt="man" /></a>
                                                                </div>
                                                                <div class="cart-info">
                                                                    <h5><a href="{{ url('/comic_detail/'.$comic->id) }}">{{ $cart[$session->sessionId]['name']}}</a></h5>
                                                                    <p>{{ $cart[$session->sessionId]['quantity'] }} x €{{ $cart[$session->sessionId]['price'] }}</p>
                                                                </div>
                                                                <div class="cart-icon">
                                                                    <a href="{{url('remove-from-cart/'.$cart[$session->sessionId]['comic_id']) }}"><i class="fa fa-remove"></i></a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if($tmp > 5)
                                                    <div class="mb-2"></div>
                                                    <div class="text-center font-weight-bold">.<br/>.<br/>.</div>
                                                    <div class="mb-3"></div>
                                                @endif
                                            </div>
                                            <div class="cart-totals">
                                                <h5>Total <span>{{ $total }}</span></h5>
                                            </div>
                                            <div class="cart-bottom">
                                                <a class="view-cart" href="{{url('/cart')}}">vedi carrello</a>
                                            </div>
                                        </div>
                                @endif
                            @endif
                            @else
                                <li><a href="{{url('/login')}}"><i class="fa fa-shopping-cart" style="padding: 0px"></i></a>
                                    @endif
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{--<div class="col-lg-2 col-md-3 col-12">
                <div class="row">
                    <div class="my-cart"> <!--uso la stessa classe perché non ho voglia di rifa, semplicemente dovrei rifare una cosa uguale con nome diverso-->
                        <ul>
                            <li>
                                @if (Route::has('login'))
                                    @auth
                                        <a class="notification" href="{{url('/accountArea/dashboard')}}">
                                            <img src="{{ asset('img/immaginiNostre/notifica.png') }}" width="30%", height="30%">
                                            @php($user = \Illuminate\Support\Facades\Auth::user())
                                            @php($number = \App\Http\Controllers\NotificationController::getNumber($user->id))

                                            @if($number > 0)
                                                <span>{{ $number }}</span>
                                            Notifiche
                                                <div class="mini-cart-sub">
                                                    <div class="cart-product">
                                                        @php($tmp2 =0)
                                                        @php($notifications = \App\Http\Controllers\NotificationController::getNotificationToRead($user->id))
                                                        @foreach($notifications as $notification)
                                                            @if ($tmp2++ < 10)
                                                                <div class="single-cart">
                                                                    @if(strlen($notification->notification_text) > 33 )
                                                                        @php($subnotification = substr($notification->notification_text, 0, 33))
                                                                        <div class="cart-info">
                                                                            <h5><a href="{{ route('notificaLetta', ['id' => $notification->id]) }}">{{ $subnotification}}...</a></h5>
                                                                        </div>
                                                                    @else
                                                                        <div class="cart-info">
                                                                            <h5><a href="{{ route('notificaLetta', ['id' => $notification->id]) }}">{{ $notification->notification_text}}</a></h5>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        @if($tmp2 > 10)
                                                            <div class="mb-2"></div>
                                                            <div class="text-center font-weight-bold">.<br/>.<br/>.</div>
                                                            <div class="mb-3"></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @else
                                                Notifiche
                                            @endif
                                        </a>
                                    @endauth
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
</div>
<!-- header-mid-area-end -->
<!-- main-menu-area-start -->
<div class="main-menu-area d-md-none d-none d-lg-block sticky-header-1" id="header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <div class="menu-area" style="margin-top:5px">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="menu-area" style="margin-top:5px">
                    <ul>
                        <li>
                            <a href="{{ url('/shoplist/manga') }}">Manga</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="menu-area" style="margin-top:5px">
                    <ul>
                        <li>
                            <a href="{{ url('/shoplist/supereroi') }}">Supereroi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ml-4"></div>
            <div class="col-lg-1">
                <div class="menu-area" style="margin-top:5px">
                    <ul>
                        <li>
                            <a href="{{ url('/shoplist/italiani') }}">Italiani</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="menu-area" style="margin-top:5px">
                    <ul>
                        <li>
                            <a href="{{route('sconto')}}">Outlet</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="menu-area" style="margin-top:5px">
                    <ul>
                        <li>
                            <a href="{{ url('blog') }}">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
            {{--@if (Route::has('login'))
                @auth
                   @if(Auth::user()->hasGroup('il gruppo degli admin'))
                    <div class="col-lg-1">
                        <div class="menu-area" style="margin-top:5px">
                            <ul>
                                <li>
                                    <a href="{{ url('/adminArea/dashboard') }}">Admin</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @else
                        <div class="col-lg-1">
                            <div class="menu-area" style="margin-top:5px">
                                <ul>
                                    <li>
                                        <a href="{{ url('/accountArea/dashboard') }}">Account</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="pl-10"></div>
                    <div class="col-lg-1">
                        <div class="menu-area" style="margin-top:5px">
                            <ul>
                                <li>
                                    <a href="{{ url('/getLogout') }}">logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pl-20"></div>
                @else
                    <div class="col-lg-1">
                        <div class="menu-area" style="margin-top:5px">
                            <ul>
                                <li>
                                    <a href="{{ route('login') }}">Accesso</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if (Route::has('register'))
                        <div class="col-lg-1">
                            <div class="menu-area" style="margin-top:5px">
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
            @endif--}}
            <div class="col-lg-5">
                <div id="search" class="header-search">
                    <ul>
                        <li>
                            <form action="{{ route('searchroute') }}" >
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