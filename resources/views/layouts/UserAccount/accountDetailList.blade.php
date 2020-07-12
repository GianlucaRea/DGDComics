<!-- entry-header-area-start -->
<div class="entry-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="entry-header-title">
                    <h2>My-Account</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- entry-header-area-end -->
<!-- my account wrapper start -->
<div class="my-account-wrapper mb-70">
    <div class="container">
        <div class="section-bg-color">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="{{route('userdashboard')}}" class="{{ (Route::currentRouteName() == 'userdashboard') ? 'active' : '' }}"  ><i class="fa fa-dashboard"></i>Dashboard</a>
                                    <a href="{{route('userorders')}}" class="{{ (Route::currentRouteName() == 'userorders') ? 'active' : '' }}"  ><i class="fa fa-cart-arrow-down"></i>Ordini</a>
                                    <a href="{{route('userwishlist')}}" class="{{ (Route::currentRouteName() == 'userwishlist') ? 'active' : '' }}"  ><i class="fa fa-shopping-bag"></i>Lista dei desideri</a>
                                    <a href="{{route('paymentmethods')}}" class="{{ (Route::currentRouteName() == 'paymentmethods') ? 'active' : '' }}"  ><i class="fa fa-credit-card"></i>Metodi di pagamento</a>
                                    <a href="{{route('addressedit')}}" class="{{ (Route::currentRouteName() == 'addressedit') ? 'active' : '' }}"  ><i class="fa fa-map-marker"></i>indirizzi di spedizione</a>
                                    <a href="{{route('accountinfo')}}" class="{{ (Route::currentRouteName() == 'accountinfo') ? 'active' : '' }}" ><i class="fa fa-user"></i> dettagli account</a>

                                    @php
                                        $isVendor = \App\Http\Controllers\GroupController::isVendor($user->id);
                                    @endphp

                                    @if($isVendor)
                                        <a href="{{route('venditoreinfo')}}" class="{{ (Route::currentRouteName() == 'venditoreinfo') ? 'active' : '' }}"><i class="fa fa-dollar"></i> gestisci ordini</a>
                                        <a href="{{route('venditoremenagementproducts')}}" class="{{ (Route::currentRouteName() == 'venditoremenagementproducts') ? 'active' : '' }}"><i class="fa fa-bookmark"></i> gestisci fumetti</a>
                                        <a href="{{route('venditoreaddproducts')}}" class="{{ (Route::currentRouteName() == 'venditoreaddproducts') ? 'active' : '' }}"><i class="fa fa-book"></i> vendi un fumetto</a>
                                    @endif
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show {{ (Route::currentRouteName() == 'userdashboard') }}" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h5>Dashboard</h5>
                                            <div class="welcome">
                                                <p>Ciao, <strong>{{ $user->username }}</strong>! (Non sei <strong>{{ $user->username }}</strong>?<a href="{{ url('/logout') }}" class="logout"> Logout</a>)</p>
                                            </div>
                                            <p class="mb-0">I tuoi dati:</p>
                                            <p class="mb-0">E-mail:   <strong>{{ $user->email }} </strong></p>
                                            <p class="mb-0">Telefono: <strong>{{ $user->phone_number }} </strong></p>
                                            @if(!$isVendor)
                                                <p class="mb-0">Vuoi diventare venditore?  <a href="{{ url('/vendor') }}" > Clicca qui</a></p>
                                            @endif
                                        </div>
                                        <div class="myaccount-content">


                                            <div class="mb-30"></div>
                                            <h5>Notifiche</h5>
                                            @if($notifications->count() < 1)
                                                <div class="myaccount-content">
                                                    <h5>Non ci sono ancora notifiche</h5>
                                                </div>
                                            @else
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>Data</th>
                                                            <th>testo</th>
                                                            <th>stato</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        {{$notifications->links()}}
                                                        @foreach($notifications as $notification)
                                                            <tr>
                                                                <td>{{ substr($notification->date, 0, 16) }}</td>
                                                                <td>
                                                                    @if(strlen($notification->notification_text) > 50 )
                                                                        @php
                                                                            $subnotification = substr($notification->notification_text, 0, 50)
                                                                        @endphp
                                                                        {{ $subnotification }}...
                                                                    @else
                                                                        {{ $notification->notification_text }}
                                                                    @endif
                                                                </td>
                                                                @if($notification->state == 1)
                                                                    @if($notification->id == 0)
                                                                        <td>
                                                                            Letto
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{ route($notification->notification)}}" class="btn btn-sqr">Dettagli</a>
                                                                        </td>
                                                                    @else
                                                                        <td>
                                                                            Letto
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{ route($notification->notification, ['id' => $notification->id])}}" class="btn btn-sqr">Dettagli</a>
                                                                        </td>
                                                                    @endif
                                                                @else
                                                                    <td>
                                                                        Non letto
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('notificaLetta', ['id' => $notification->id]) }}" class="btn btn-sqr">Dettagli</a>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->

                                    <div class="tab-pane fade show {{ (Route::currentRouteName() == 'userorders') }}" id="orders" role="tabpanel">

                                        @if($orders->count()<1)
                                            <div class="myaccount-content">
                                                <h5>Non sono ancora stati effettuati degli ordini</h5>
                                            </div>
                                        @else
                                            <div class="myaccount-content">
                                                <h5>Ordini</h5>
                                                <div class="blog-left-title">
                                                    <h3>Search</h3>
                                                </div>
                                                <div class="side-form">
                                                    <form action="{{ route('searchwishrouteUserPanel') }}">
                                                        <input type="text" name="search" placeholder="Cerca un ordine in base ai fumetti comprati, l'indirizzo di spedizione, il venditore etc..." />
                                                        <a  href="javascript:;" onclick="parentNode.submit();"><i class="fa fa-search"></i></a>
                                                    </form>
                                                </div>
                                                <div class="mt-3"></div>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>Ordine</th>
                                                            <th>Data</th>
                                                            <th>Totale</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        {{$orders->links()}}
                                                        @foreach($orders as $order)
                                                            <tr>
                                                                <td>{{ $order->id }}</td>
                                                                <td>{{ substr($order->date, 0,10) }}</td>
                                                                <td>€ {{ $order->total }}</td>
                                                                <td><a href="{{ route('orderDetail', ['id' => $order->id]) }}" class="btn btn-sqr">Dettagli</a></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    @foreach($orders as $order)
                                                    @endforeach
                                                    {{$orders->links()}}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->

                                    <div class="tab-pane fade show {{ (Route::currentRouteName() == 'userwishlist') }} active" id="wishlist" role="tabpanel">

                                        @if($list->count()<1)
                                            <div class="myaccount-content">
                                                <div class="blog-left-title">
                                                    <h3>Search</h3>
                                                </div>
                                                <div class="side-form">
                                                    <form action="{{ route('searchwishrouteUserPanel') }}">
                                                        <input type="text" name="search" placeholder="Cerca un fumetto in base al titolo, la descrizione, il venditore etc..." />
                                                        <a  href="javascript:;" onclick="parentNode.submit();"><i class="fa fa-search"></i></a>
                                                    </form>
                                                </div>
                                                <div class="mt-3"></div>
                                                <h3>nessun risultato di ricerca</h3>
                                            </div>
                                            <div class="mt-3"></div>
                                            <div class="row">
                                                <div class="col-lg-10"></div>
                                                <div style="margin-right: 2.75%"></div>
                                                <div class="col-lg-1">
                                                    <div class="buttons-back">
                                                        <a href="{{url('/accountArea/wishlist')}}">Indietro</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="blog-left-title">
                                                <h3>Search</h3>
                                            </div>
                                            <div class="side-form">
                                                <form action="{{ route('searchwishrouteUserPanel') }}">
                                                    <input type="text" name="search" placeholder="Cerca un fumetto in base al titolo, la descrizione, il venditore etc..." />
                                                    <a  href="javascript:;" onclick="parentNode.submit();"><i class="fa fa-search"></i></a>
                                                </form>
                                            </div>
                                            <div class="mt-3"></div>
                                            <div class="table-cart table-responsive mb-15">
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th class="product-thumbnail">immagine</th>
                                                        <th class="product-name">nome fumetto</th>
                                                        <th class="product-seller">venditore</th>
                                                        <th class="product-price">prezzo</th>
                                                        <th class="product-price">quantità disponibile</th>
                                                        <th class="product-remove">Rimuovi</th>
                                                        <th class="product-seller"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    {{$list->links()}}
                                                    @php($collect = collect())
                                                    @foreach($list as $item)
                                                        @if(\App\Http\Controllers\WishlistController::control($item->id))
                                                            @php($comic = \App\Http\Controllers\WishlistController::getComicWishlistTuple($item->id))
                                                            @if($collect->isEmpty())
                                                                @php($cover = \App\Http\Controllers\ImageController::getCover($comic->id))
                                                                @php($seller = \App\Http\Controllers\ComicController::getSeller($comic->id))
                                                                @if(session('cart'))
                                                                    @php($cart = session()->get('cart'))
                                                                    @php($sessions = \Illuminate\Support\Facades\DB::table('sessions')->get())
                                                                    @foreach($sessions as $session)
                                                                        @php($user = \Illuminate\Support\Facades\Auth::user())
                                                                        @if($cart[$session->sessionId]['user'] == $user->id)
                                                                            @php($comic2 = \App\Http\Controllers\ComicController::getByID($cart[$session->sessionId]["comic_id"]))
                                                                            @if($comic->id == $cart[$session->sessionId]['comic_id'])
                                                                                @php($realQty = $comic->quantity + $cart[$session->sessionId]['quantity'])
                                                                                @php($collect->push($comic->id))
                                                                                <tr>
                                                                                    <td class="product-thumbnail"><a href="{{ url('/comic_detail/'.$comic->id) }}"><img src="{{asset('img/comicsImages/' . $cover->image_name) }}" alt="man" /></a></td>
                                                                                    <td class="product-name">{{ $comic->comic_name }}</td>
                                                                                    <td class="product-seller">{{ $seller->username }}</td>
                                                                                    <td class="product-price"><span class="amount">{{ $comic->price }}</span></td>
                                                                                    <td class="product-price"><span class="amount">{{ $realQty }}</span></td>
                                                                                    <td class="product-remove"><a href="{{url('remove-from-list/'.$comic->id) }}"><i class="fa fa-times"></i></a></td>
                                                                                    @if(\App\Http\Controllers\ComicController::getrelated($comic->id)->count()<1)
                                                                                        <td class="product-seller"><p style="font-size: 13px;"><b>Purtroppo nel negozio non ci sono prodotti simili</b></p></td>
                                                                                    @else
                                                                                        <td class="product-seller"><p style="font-size: 13px;"><b>Ehy! a quanto pare nel negozio ci sono prodotti simili!</b></p></td>
                                                                                    @endif
                                                                                </tr>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                @if($collect->isEmpty())
                                                                    @php($collect->push($comic->id))
                                                                    <tr>
                                                                        <td class="product-thumbnail"><a href="{{ url('/comic_detail/'.$comic->id) }}"><img src="{{asset('img/comicsImages/' . $cover->image_name) }}" alt="man" /></a></td>
                                                                        <td class="product-name">{{ $comic->comic_name }}</td>
                                                                        <td class="product-seller">{{ $seller->username }}</td>
                                                                        <td class="product-price"><span class="amount">{{ $comic->price }}</span></td>
                                                                        <td class="product-price"><span class="amount">{{ $comic->quantity }}</span></td>
                                                                        <td class="product-remove"><a href="{{url('remove-from-list/'.$comic->id) }}"><i class="fa fa-times"></i></a></td>
                                                                        @if(\App\Http\Controllers\ComicController::getrelated($comic->id)->count()<1)
                                                                            <td class="product-seller"><p style="font-size: 13px;"><b>Purtroppo nel negozio non ci sono prodotti simili</b></p></td>
                                                                        @else
                                                                            <td class="product-seller"><p style="font-size: 13px;"><b>Ehy! a quanto pare nel negozio ci sono prodotti simili!</b></p></td>
                                                                        @endif
                                                                    </tr>
                                                                @endif
                                                            @else
                                                                @if(!($collect->contains($comic->id)))
                                                                    @php($cover = \App\Http\Controllers\ImageController::getCover($comic->id))
                                                                    @php($seller = \App\Http\Controllers\ComicController::getSeller($comic->id))
                                                                    @if(session('cart'))
                                                                        @php($cart = session()->get('cart'))
                                                                        @php($sessions = \Illuminate\Support\Facades\DB::table('sessions')->get())
                                                                        @foreach($sessions as $session)
                                                                            @php($user = \Illuminate\Support\Facades\Auth::user())
                                                                            @if($cart[$session->sessionId]['user'] == $user->id)
                                                                                @php($comic2 = \App\Http\Controllers\ComicController::getByID($cart[$session->sessionId]["comic_id"]))
                                                                                @if($comic->id == $cart[$session->sessionId]['comic_id'])
                                                                                    @php($realQty = $comic->quantity + $cart[$session->sessionId]['quantity'])
                                                                                    @php($collect->push($comic->id))
                                                                                    <tr>
                                                                                        <td class="product-thumbnail"><a href="{{ url('/comic_detail/'.$comic->id) }}"><img src="{{asset('img/comicsImages/' . $cover->image_name) }}" alt="man" /></a></td>
                                                                                        <td class="product-name">{{ $comic->comic_name }}</td>
                                                                                        <td class="product-seller">{{ $seller->username }}</td>
                                                                                        <td class="product-price"><span class="amount">{{ $comic->price }}</span></td>
                                                                                        <td class="product-price"><span class="amount">{{ $realQty }}</span></td>
                                                                                        <td class="product-remove"><a href="{{url('remove-from-list/'.$comic->id) }}"><i class="fa fa-times"></i></a></td>
                                                                                        @if(\App\Http\Controllers\ComicController::getrelated($comic->id)->count()<1)
                                                                                            <td class="product-seller"><p style="font-size: 13px;"><b>Purtroppo nel negozio non ci sono prodotti simili</b></p></td>
                                                                                        @else
                                                                                            <td class="product-seller"><p style="font-size: 13px;"><b>Ehy! a quanto pare nel negozio ci sono prodotti simili!</b></p></td>
                                                                                        @endif
                                                                                    </tr>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                    @if(!($collect->contains($comic->id)))
                                                                        @php($collect->push($comic->id))
                                                                        <tr>
                                                                            <td class="product-thumbnail"><a href="{{ url('/comic_detail/'.$comic->id) }}"><img src="{{asset('img/comicsImages/' . $cover->image_name) }}" alt="man" /></a></td>
                                                                            <td class="product-name">{{ $comic->comic_name }}</td>
                                                                            <td class="product-seller">{{ $seller->username }}</td>
                                                                            <td class="product-price"><span class="amount">{{ $comic->price }}</span></td>
                                                                            <td class="product-price"><span class="amount">{{ $comic->quantity }}</span></td>
                                                                            <td class="product-remove"><a href="{{url('remove-from-list/'.$comic->id) }}"><i class="fa fa-times"></i></a></td>
                                                                            @if(\App\Http\Controllers\ComicController::getrelated($comic->id)->count()<1)
                                                                                <td class="product-seller"><p style="font-size: 13px;"><b>Purtroppo nel negozio non ci sono prodotti simili</b></p></td>
                                                                            @else
                                                                                <td class="product-seller"><p style="font-size: 13px;"><b>Ehy! a quanto pare nel negozio ci sono prodotti simili!</b></p></td>
                                                                            @endif
                                                                        </tr>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @else
                                                            <td class="product-thumbnail"><img src="{{asset('img/immaginiNostre/wishlistDisclaimer.jpg') }}" alt="man" /></td>
                                                            <td class="product-name"> purtroppo il fumetto è stato rimosso da DGD comics per volontà del venditore o perché (il venditore o il fumetto) non seguiva il regolamento... ma non temere, lo staff di DGDcomics lavorerà per farlo tornare disponibile!</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="product-remove"><a href="{{url('remove-from-list-case-lost/'.$item->id) }}"><i class="fa fa-times"></i></a></td>
                                                        @endif
                                                    @endforeach
                                                    </tbody>

                                                </table>
                                                @foreach($list as $item)
                                                @endforeach
                                                {{$list->links()}}
                                            </div>
                                            <div class="mt-3"></div>
                                            <div class="row">
                                                <div class="col-lg-10"></div>
                                                <div style="margin-right: 2.75%"></div>
                                                <div class="col-lg-1">
                                                    <div class="buttons-back">
                                                        <a href="{{url('/accountArea/wishlist')}}">Indietro</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show {{ (Route::currentRouteName() == 'paymentmethods')}}" id="payment-method" role="tabpanel">

                                        @php($oggi = \App\Http\Controllers\PaymentMethodController::getTime())
                                        {{$paymentMethods->links()}}
                                        @if($paymentMethods->count() < 1)
                                            <div class="myaccount-content">
                                                <h5>Non sono ancora stati inseriti metodi di pagamento dall'utente</h5>
                                            </div>
                                        @else

                                            <div class="myaccount-content">
                                            @foreach($paymentMethods as $paymentMethod)
                                                @php(\App\Http\Controllers\PaymentMethodController::checkIfNotScaduta($paymentMethod->id))
                                                @if($paymentMethod->favourite != 0)
                                                    @php($dataScadenza = $paymentMethod->data_scadenza) <!--Raga so che andava bene anche con php ed end php, ma a caso ha cominciato a dare errore ovunque, vallo a capi-->
                                                        @php($scadenza = strtotime($dataScadenza))
                                                        <h5>I TUOI METODI DI PAGAMENTO</h5>
                                                        <address>
                                                            <h6>PREDEFINITO</h6>
                                                            <p><strong>{{ $paymentMethod->payment_type }}</strong></p>
                                                            <p><strong>Intestatario: </strong>{{ $paymentMethod->intestatario }}</p>
                                                            @php($last_four_digits = substr($paymentMethod->cardNumber, 12, 16))
                                                            <p><strong>Numero carta: </strong>****-****-****-{{ $last_four_digits }}</p>
                                                            <p><strong>Data scadenza: </strong>{{ substr($paymentMethod->data_scadenza, 0,7) }}</p>
                                                            @if($scadenza - $oggi < 0)
                                                                <h5>LA TUA CARTA È SCADUTA</h5>
                                                            @else
                                                                @if($scadenza - $oggi < 2592000)
                                                                    <h5>LA TUA CARTA STA PER SCADERE</h5>
                                                                @endif
                                                            @endif
                                                        </address>
                                                        <a href="{{ Route('remove.method', ['method' => $paymentMethod->id])}}" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                            Rimuovi metodo di pagamento</a>
                                                    @endif
                                                @endforeach
                                            </div>

                                            @foreach($paymentMethods as $paymentMethod)
                                                @if($paymentMethod->favourite != 1)
                                                    @php($dataScadenza = $paymentMethod->data_scadenza)
                                                    @php($scadenza = strtotime($dataScadenza))
                                                    <div class="myaccount-content">
                                                        <address>
                                                            <p><strong>{{ $paymentMethod->payment_type }}</strong></p>
                                                            <p><strong>Intestatario: </strong>{{ $paymentMethod->intestatario }}</p>
                                                            @php($last_four_digits = substr($paymentMethod->cardNumber, 12, 16))
                                                            <p><strong>Numero carta: </strong>****-****-****-{{ $last_four_digits }}</p>
                                                            <p><strong>Data scadenza: </strong>{{ substr($paymentMethod->data_scadenza, 0,7) }}</p>
                                                            @if($scadenza - $oggi < 0)
                                                                <h5>LA TUA CARTA È SCADUTA</h5>
                                                            @else
                                                                @if($scadenza - $oggi < 2592000)
                                                                    <h5>LA TUA CARTA STA PER SCADERE</h5>
                                                                @endif
                                                            @endif
                                                        </address>
                                                        <a href="{{ Route('remove.method', ['method' => $paymentMethod->id])}}" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                            Rimuovi metodo di pagamento</a>
                                                        @if($scadenza - $oggi > 0)
                                                            <a href="{{ Route('predefinite.method', ['method' => $paymentMethod->id])}}" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                                Rendi predefinito</a>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                        <div class="row mt-20">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6" style="text-align: right;">
                                                <a href="{{ Route('addMethod')}}" class="btn btn-sqr"><i class="fa fa-edit;"></i>
                                                    Aggiungi metodo di pagamento</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show {{ (Route::currentRouteName() == 'addressedit')}}" id="address-edit" role="tabpanel">

                                        @if($shippingAddresses->count() < 1)
                                            <div class="myaccount-content">
                                                <h5>Non sono ancora stati inseriti indirizzi di spedizione dall'utente</h5>
                                            </div>
                                        @else
                                            {{$shippingAddresses->links()}}
                                            <div class="myaccount-content">
                                                @foreach($shippingAddresses as $shippingAddress)
                                                    @if($shippingAddress->favourite != 0)
                                                        <h5>I TUOI INDIRIZZI</h5>
                                                        <address>
                                                            <h6>PREDEFINITO</h6>
                                                            <p><strong>{{ $shippingAddress->città }} </strong> <strong>{{ $shippingAddress->post_code }}</strong></p>
                                                            <p><strong>{{ $shippingAddress->via }}</strong> <strong>{{ $shippingAddress->civico }}</strong></p>
                                                            <p><strong>{{ $shippingAddress->other_info }} </strong></p>
                                                        </address>
                                                        <a href="{{ Route('remove.address', ['address' => $shippingAddress->id])}}" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                            Rimuovi indirizzo di spedizione</a>
                                                    @endif
                                                @endforeach
                                            </div>

                                            @foreach($shippingAddresses as $shippingAddress)
                                                @if($shippingAddress->favourite != 1)
                                                    <div class="myaccount-content">
                                                        <address>
                                                            <p><strong>{{ $shippingAddress->città }} </strong> <strong>{{ $shippingAddress->post_code }}</strong></p>
                                                            <p><strong>{{ $shippingAddress->via }}</strong> <strong>{{ $shippingAddress->civico }}</strong></p>
                                                            <p><strong>{{ $shippingAddress->other_info }} </strong></p>
                                                        </address>
                                                        <a href="{{ Route('remove.address', ['address' => $shippingAddress->id])}}" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                            Rimuovi indirizzo di spedizione</a>
                                                        <a href="{{ Route('predefinite.address', ['address' => $shippingAddress->id])}}" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                            Rendi predefinito</a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif

                                        <div class="row mt-20">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6" style="text-align: right;">
                                                <a href="{{ Route('addAddress')}}" class="btn btn-sqr"><i class="fa fa-edit;"></i>
                                                    Aggiungi Indirizzo di spedizione</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show {{ (Route::currentRouteName() == 'accountinfo')}}"  id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h5>Dettagli account</h5>
                                            <div class="account-details-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item-not-editable">
                                                            <h5>NOME <br><br>{{$user->name}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item-not-editable">
                                                            <h5>COGNOME <br><br>{{$user->surname}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-2"></div>
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <div class="single-input-item-not-editable">
                                                            <h5>NICKNAME <br><br>{{$user->username}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="single-input-item-not-editable">
                                                            <h5>ETA' <br><br>{{$user->age}}</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form method="POST" action="{{ route('change.password') }}">
                                                    @csrf
                                                    <fieldset>

                                                        <legend>Cambia password</legend>

                                                        <div class="single-input-item">
                                                            <label for="password" class="required">Password corrente</label>
                                                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder="Password corrente" >

                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="newPassword" class="required">Nuova password</label>
                                                                    <input type="password" id="newPassword" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" required autocomplete="newPassword" placeholder="Nuova password" >

                                                                    @error('newPassword')
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirmPassword" class="required">Conferma password</label>
                                                                    <input type="password" id="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword" required autocomplete="confirmPassword" placeholder="Conferma password" >

                                                                    @error('confirmPassword')
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </fieldset>

                                                    <div class="single-input-item">
                                                        <button type="submit" class="btn btn-sqr">Salva</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                @if($isVendor)
                                    <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show {{ (Route::currentRouteName() == 'venditoreinfo')}}" id="venditore-info" role="tabpanel">
                                            @if($orders_of_vendor->count() < 1)
                                                <div class="myaccount-content">
                                                    <h5>Oh, sembra che ancora non hai venduto nulla...</h5>
                                                </div>
                                            @else
                                                <div class="myaccount-content">
                                                    <h5>Vendite</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th>Comic</th>
                                                                <th>Data</th>
                                                                <th>Azione</th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            @php($orders_of_vendor = \App\Http\Controllers\OrderController::getAllOrdersOfVendor($user->id))
                                                            <tbody>
                                                            {{$orders_of_vendor->links()}}
                                                            @foreach($orders_of_vendor as $order_of_vendor)
                                                                <tr>

                                                                    <td>{{ $order_of_vendor->order_id }}</td>
                                                                    <td>{{ substr($order_of_vendor->date, 0,10) }}</td>
                                                                    <td><a href="{{ route('orderDetailVendor', ['id' => $order_of_vendor->order_id]) }}" class="btn btn-sqr">Dettagli</a></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        @foreach($orders_of_vendor as $order_of_vendor)
                                                        @endforeach
                                                        {{$orders_of_vendor->links()}}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show {{ (Route::currentRouteName() == 'venditoremenagementproducts') }}" id="venditore-menagement-products" role="tabpanel">
                                            @if($comics_of_vendor->count() < 1)
                                                <div class="myaccount-content">
                                                    <h5>Oh, sembra che ancora non hai fumetti in vendita</h5>
                                                </div>
                                            @else
                                                <div class="table-cart table-responsive mb-15">
                                                    <table>
                                                        <thead>
                                                        <tr>
                                                            <th>immagine</th>
                                                            <th>nome</th>
                                                            <th>copie vendute</th>
                                                            <th>recensioni</th>
                                                            <th>prezzo</th>
                                                            <th>Azione</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        {{$comics_of_vendor->links()}}
                                                        @foreach($comics_of_vendor as $comic_of_vendor)
                                                            <tr>
                                                                @php($cover_of_comic_of_vendor = \App\Http\Controllers\ImageController::getCover($comic_of_vendor->id))
                                                                <td class="product-thumbnail"><a href="{{ url('/comic_detail/'.$comic_of_vendor->id) }}"><img src="{{asset('img/comicsImages/' . $cover_of_comic_of_vendor->image_name) }}" alt="man" /></a></td>
                                                                <td>{{ $comic_of_vendor->comic_name }}</td>
                                                                @php($soldQuantity = \App\Http\Controllers\ComicBoughtController::getSoldQuantity($comic_of_vendor->id))
                                                                <td>{{ $soldQuantity }}</td>
                                                                @php($reviewQuantity = \App\Http\Controllers\ReviewController::getReviewQuantity($comic_of_vendor->id))
                                                                <td>{{ $reviewQuantity }}</td>
                                                                <td>{{ $comic_of_vendor->price }}</td>
                                                                <td>
                                                                    <a class="btn btn-light" href="{{url('/comicModify/'. $comic_of_vendor->id)}}"><i class="fa fa-pencil"></i></a>
                                                                    <a class="btn btn-danger" onclick="return deleteComic();"  href="{{route('comic-delete-vendor', $comic_of_vendor->id)}}"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    @foreach($comics_of_vendor as $comic_of_vendor)
                                                    @endforeach
                                                    {{$comics_of_vendor->links()}}
                                                </div>
                                            @endif
                                        </div>
                                        <!-- Single Tab Content End -->



                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show {{ (Route::currentRouteName() == 'venditoreaddproducts')}}" id="venditore-add-products" role="tabpanel">
                                            <fieldset>
                                                <legend>
                                                    Aggiungi un fumetto
                                                </legend>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="billing-fields">
                                                        <form method="POST" id="postComicPart" action="{{ url('/addComic') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="single-input-item">
                                                                        <label for="comic_name" class="required">Titolo Fumetto<span>*</span></label>
                                                                        <input id="comic_name" type="text" class="form-control @error('comic_name') is-invalid @enderror" name="comic_name">
                                                                        @error('comic_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mt-2"></div>

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="single-input-item">
                                                                        <label for="description" class="required">Descrizione<span>*</span></label>
                                                                        <!--TinyMce js-->
                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js" referrerpolicy="origin"></script>
                                                                        <script>
                                                                            tinymce.init({
                                                                                selector: '#description',
                                                                                height: 200,
                                                                                statusbar: false,
                                                                                menubar: false,

                                                                            });
                                                                        </script>

                                                                        <textarea id="description" name="description" ></textarea>
                                                                        @error('description')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mt-2"></div>

                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="ISBN" class="required">ISBN<span>*</span></label>
                                                                        <input id="ISBN" type="text" class="form-control @error('ISBN') is-invalid @enderror" name="ISBN" >
                                                                        @error('ISBN')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="publisher" class="required">Casa Editrice<span>*</span></label>
                                                                        <input id="publisher" type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher">
                                                                        @error('publisher')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mt-2"></div>

                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="author_name" class="required">Autore<span>*</span></label>
                                                                        <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name">
                                                                        @error('author_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="language" class="required">Lingua<span>*</span></label>
                                                                        <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language">
                                                                        @error('language')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mt-2"></div>

                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="type" class="required">Tipo<span>*</span></label>
                                                                        <br/>
                                                                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                                                            <option value="shonen"> shonen </option>
                                                                            <option value="seinen"> seinen </option>
                                                                            <option value="shojo"> shojo </option>
                                                                            <option value="josei"> josei </option>
                                                                            <option value="dc"> dc </option>
                                                                            <option value="marvel"> marvel </option>
                                                                            <option value="italiano"> italiano </option>
                                                                            <option value="other"> other </option>
                                                                        </select>
                                                                        @error('type')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item"></div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2"></div>

                                                            <label for="genre_name" class="required">Generi<span>*</span></label>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <input type="checkbox" id="Alternativo" name="Alternativo" value="Alternativo">  Alternativo
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="Avventura" name="Avventura" value="Avventura">  Avventura
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="Fantascienza" name="Fantascienza" value="Fantascienza">  Fantascienza
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="Fantasy" name="Fantasy" value="Fantasy">  Fantasy
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="Azione" name="Azione" value="Azione">  Azione
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="Umoristico" name="Umoristico" value="Umoristico">  Umoristico
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="Western" name="Western" value="Western">  Western
                                                                        <div class="mt-1"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <input type="checkbox" id="Supereroi" name="Supereroi" value="Supereroi">  Supereroi
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="Horror" name="Horror" value="Horror">  Horror
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="Thriller" name="Thriller" value="Thriller">  Thriller
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="Giallo" name="Giallo" value="Giallo">  Giallo
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="Disney" name="Disney" value="Disney">  Disney
                                                                        <div class="mt-1"></div>
                                                                        <input type="checkbox" id="PostApocalittico" name="PostApocalittico" value="PostApocalittico">  Post Apocalittico
                                                                        <div class="mt-1"></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mt-2"></div>

                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <label for="price"> Prezzo (no virgola)<span>*</span></label>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label for="price"> Quantità<span>*</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="single-input-item">
                                                                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Ad esempio 4.99">
                                                                        @error('price')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4">
                                                                    <div class="single-input-item">
                                                                        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" min="1">
                                                                        @error('quantity')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mt-2"></div>

                                                            <div class="row">
                                                                <div class="col-lg-9">
                                                                    <label for="dimenction"> Dimensioni</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <div class="single-input-item">
                                                                        <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" placeholder="Altezza" min="1">
                                                                        @error('height')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                x
                                                                <div class="col-lg-4">
                                                                    <div class="single-input-item">
                                                                        <input id="length" type="number" class="form-control @error('length') is-invalid @enderror" name="length" placeholder="Lunghezza" min="1">
                                                                        @error('length')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                x
                                                                <div class="col-lg-4">
                                                                    <div class="single-input-item">
                                                                        <input id="width" type="number" class="form-control @error('width') is-invalid @enderror" name="width" placeholder="Profondità" min="1">
                                                                        @error('width')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                cm
                                                                <div class="mt-2"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="file" class="required">Immagine di copertina:<span>*</span></label>
                                                                        <br/>
                                                                        <input type="file" id="cover" name="cover" class="form-control @error('cover') is-invalid @enderror">
                                                                        @error('cover')
                                                                        <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mt-2"></div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label for="file" class="required">Altre immagini:</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    immagine 1
                                                                    <input type="file" id="image1" name="image1" class="form-control @error('image1') is-invalid @enderror">
                                                                    @error('image1')
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <div class="mt-2"></div>
                                                                    immagine 2
                                                                    <input type="file" id="image2" name="image2" class="form-control @error('image2') is-invalid @enderror">
                                                                    @error('image2')
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    immagine 3
                                                                    <input type="file" id="image3" name="image3" class="form-control @error('image3') is-invalid @enderror">
                                                                    @error('image3')
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <div class="mt-2"></div>
                                                                    immagine 4
                                                                    <input type="file" id="image4" name="image4" class="form-control @error('image4') is-invalid @enderror">
                                                                    @error('image4')
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="mt-3"></div>

                                                            <div class="row">
                                                                <div class="col-lg-10"></div>
                                                                <div class="col-lg-2">
                                                                    <div class="single-input-item">
                                                                        <button type="submit" class="btn btn-sqr">PUBBLICA</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <!-- Single Tab Content End -->
                                    @endif
                                </div>
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>

<script>
    function deleteComic() {
        if(!confirm("Sei sicuro di voler eliminare questo fumetto?"))
            event.preventDefault();
    }
</script>


<!-- my account wrapper end -->