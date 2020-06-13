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
                                    <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>Dashboard</a>
                                    <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>Ordini</a>
                                    <a href="#wishlist" data-toggle="tab"><i class="fa fa-shopping-bag"></i>Lista dei desideri</a>
                                    <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>Metodi di pagamento</a>
                                    <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>indirizzi di spedizione</a>
                                    <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> dettagli account</a>

                                    @php
                                        $isVendor = \App\Http\Controllers\GroupController::isVendor($user->id);
                                    @endphp

                                    @if($isVendor)
                                        <a href="#venditore-info" data-toggle="tab"><i class="fa fa-dollar"></i> gestisci ordini</a>
                                        <a href="#venditore-menagement-products" data-toggle="tab"><i class="fa fa-bookmark"></i> gestisci fumetti</a>
                                        <a href="#venditore-add-products" data-toggle="tab"><i class="fa fa-book"></i> vendi un fumetto</a>
                                    @endif



                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
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
                                            @php
                                                $notifications = \App\Http\Controllers\NotificationController::getNotification($user->id);
                                            @endphp

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

                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        @php($orders = \App\Http\Controllers\OrderController::getAllOrderByUser($user->id))
                                        @if($orders->count()<1)
                                            <div class="myaccount-content">
                                                <h5>Non sono ancora stati effettuati degli ordini</h5>
                                            </div>
                                        @else
                                            <div class="myaccount-content">
                                                <h5>Ordini</h5>
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
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->

                                    <div class="tab-pane fade" id="wishlist" role="tabpanel">
                                        @php($list = \App\Http\Controllers\WishlistController::getAllListByUser($user->id))
                                        @if($list->count()<1)
                                            <div class="myaccount-content">
                                                <h5>Non sono presenti fumetti nella lista dei desideri</h5>
                                            </div>
                                        @else
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
                                                    @php($collect = collect())
                                                    @foreach($list as $item)
                                                        @php($comic = \App\Http\Controllers\WishlistController::getComicWishlistTuple($item->id))
                                                        @if($collect->isEmpty())
                                                            @php($cover = \App\Http\Controllers\ImageController::getCover($comic->id))
                                                            @php($seller = \App\Http\Controllers\ComicController::getSeller($comic->user_id))
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
                                                                @php($seller = \App\Http\Controllers\ComicController::getSeller($comic->user_id))
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
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                        @php($paymentMethods = \App\Http\Controllers\PaymentMethodController::getPaymentMethodByUserId($user->id))
                                        @php($oggi = \App\Http\Controllers\PaymentMethodController::getTime())

                                        @if($paymentMethods->count() < 1)
                                            <div class="myaccount-content">
                                                <h5>Non sono ancora stati inseriti metodi di pagamento dall'utente</h5>
                                            </div>
                                        @endif

                                        <div class="myaccount-content">
                                        @foreach($paymentMethods as $paymentMethod)
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
                                                </div>
                                            @endif
                                        @endforeach
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
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        @php($shippingAddresses = \App\Http\Controllers\ShippingAddressController::getShippingAddressByUserId($user->id))
                                        @if($shippingAddresses->count() < 1)
                                            <div class="myaccount-content">
                                                <h5>Non sono ancora stati inseriti indirizzi di spedizione dall'utente</h5>
                                            </div>
                                        @endif

                                        <div class="myaccount-content">
                                            <h5>I TUOI INDIRIZZI</h5>
                                            @foreach($shippingAddresses as $shippingAddress)
                                                @if($shippingAddress->favourite != 0)
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
                                                </div>
                                            @endif
                                        @endforeach
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
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h5>Dettagli account</h5>
                                            <div class="account-details-form">
                                                <form action="#">
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
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    @if($isVendor)
                                    <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="venditore-info" role="tabpanel">
                                            @if(\App\Http\Controllers\OrderController::getAllOrdersOfVendor($user->id)->count() < 1)
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
                                                            @foreach($orders_of_vendor as $order_of_vendor)
                                                                <tr>

                                                                    <td>{{ $order_of_vendor->order_id }}</td>
                                                                    <td>{{ substr($order_of_vendor->date, 0,10) }}</td>
                                                                    <td><a href="{{ route('orderDetailVendor', ['id' => $order_of_vendor->order_id]) }}" class="btn btn-sqr">Dettagli</a></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="venditore-menagement-products" role="tabpanel">
                                            @if(\App\Http\Controllers\ComicController::getComicOfVendor($user->id)->count() < 1)
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
                                                            @php($comics_of_vendor = \App\Http\Controllers\ComicController::getComicOfVendor($user->id))
                                                            <tbody>
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
                                                                        <a class="btn btn-danger" href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a class="btn btn-danger" onclick="return deleteComic();"  href="{{route('comic-delete-vendor', $comic_of_vendor->id)}}"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="venditore-add-products" role="tabpanel">
                                            <fieldset>
                                                <legend>
                                                    Aggiungi un fumetto
                                                </legend>
                                                <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
                                                    <div class="billing-fields">
                                                        <form method="POST" action="#">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="single-input-item">
                                                                        <label for="titolo" class="required">Titolo Fumetto<span>*</span></label>
                                                                        <input id="titolo" type="text" class="form-control @error('titolo') is-invalid @enderror" name="titolo" placeholder="Titolo">
                                                                        @error('titolo')
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
                                                                        <input id="ISBN" type="text" class="form-control @error('ISBN') is-invalid @enderror" name="ISBN" placeholder="ISBN">
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
                                                                        <input id="publisher" type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" placeholder="casa editice">
                                                                        @error('casa editice')
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
                                                                    <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" placeholder="Nome e Cognome">
                                                                    @error('name_genre')
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
                                                                    <label for="author_name" class="required">Lingua<span>*</span></label>
                                                                    <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" placeholder="Es: Italiano, giapponese...">
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
                                                                    <select name="type" id="payment_type" class="form-control @error('type') is-invalid @enderror">
                                                                        <option value="manga"> shonen </option>
                                                                        <option value="fumetto Italiano"> seinen </option>
                                                                        <option value="fumetto Americano"> shojo </option>
                                                                        <option value="manga"> josei </option>
                                                                        <option value="fumetto Italiano"> dc </option>
                                                                        <option value="fumetto Americano"> marvel </option>
                                                                        <option value="manga"> italiano </option>
                                                                        <option value="fumetto Italiano"> other </option>
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
                                                                <div class="single-input-item">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-2"></div>

                                                        <label for="genre_name" class="required">Generi<span>*</span></label>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <input type="checkbox" id="checkAvventura" name="checkAvventura" value="Avventura">
                                                                    <label for="checkAvventura"> Avventura</label><br>
                                                                    <input type="checkbox" id="checkFantascienza" name="checkFantascienza" value="Fantascienza">
                                                                    <label for="checkFantascienza"> Fantascienza</label><br>
                                                                    <input type="checkbox" id="checkFantasy" name="checkFantasy" value="Fantasy">
                                                                    <label for="checkFantasy"> Fantasy</label><br>
                                                                    <input type="checkbox" id="checkAzione" name="checkAzione" value="Azione">
                                                                    <label for="checkAzione"> Azione</label><br>
                                                                    <input type="checkbox" id="checkUmoristico" name="checkUmoristico" value="Umoristico">
                                                                    <label for="checkUmoristico"> Umoristico</label><br>
                                                                    <input type="checkbox" id="checkAvventura" name="checkAvventura" value="Avventura">
                                                                    <label for="checkAvventura"> Avventura</label><br>
                                                                    <input type="checkbox" id="checkWestern" name="checkWestern" value="Western">
                                                                    <label for="checkWestern"> Western</label><br>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <input type="checkbox" id="checkAlternativo" name="checkAlternativo" value="Alternativo">
                                                                    <label for="checkAlternativo"> Alternativo</label><br>
                                                                    <input type="checkbox" id="checkSupereroi" name="checkSupereroi" value="Supereroi">
                                                                    <label for="checkSupereroi"> Supereroi</label><br>
                                                                    <input type="checkbox" id="checkHorror" name="checkHorror" value="Horror">
                                                                    <label for="checkHorror"> Horror</label><br>
                                                                    <input type="checkbox" id="checkThriller" name="checkThriller" value="Thriller">
                                                                    <label for="checkThriller"> Thriller</label><br>
                                                                    <input type="checkbox" id="checkGiallo" name="checkGiallo" value="Giallo">
                                                                    <label for="checkGiallo"> Giallo</label><br>
                                                                    <input type="checkbox" id="checkDisney" name="checkDisney" value="Disney">
                                                                    <label for="checkDisney"> Disney</label><br>
                                                                    <input type="checkbox" id="checkPostApocalittico" name="checkPostApocalittico" value="Post Apocalittico">
                                                                    <label for="checkPostApocalittico"> Post Apocalittico</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-2"></div>

                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label for="price"> Prezzo</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <label for="dimenction"> Dimensioni</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="single-input-item">
                                                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="4,99">
                                                                    @error('price')
                                                                    <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="single-input-item">
                                                                    <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" placeholder="Altezza">
                                                                    @error('height')
                                                                    <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="single-input-item">
                                                                    <input id="width" type="text" class="form-control @error('width') is-invalid @enderror" name="width" placeholder="Profondità">
                                                                    @error('width')
                                                                    <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="single-input-item">
                                                                    <input id="length" type="text" class="form-control @error('length') is-invalid @enderror" name="length" placeholder="Lunghezza">
                                                                    @error('length')
                                                                    <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3"></div>

                                                        <div class="single-input-item">
                                                            <button type="submit" class="btn btn-sqr">PUBBLICA ORA!</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <!-- Single Tab Content End -->
                                    @endif
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
</div>
<!-- my account wrapper end -->