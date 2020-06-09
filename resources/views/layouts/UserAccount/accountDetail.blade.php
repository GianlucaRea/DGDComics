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
                                    <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>Metodi di pagamento</a>
                                    <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>indirizzi di spedizione</a>
                                    <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> dettagli account</a>

                                    @php
                                        $isvendor = \App\Http\Controllers\GroupController::isVendor($user->id);
                                    @endphp

                                    @if($isvendor)
                                        <a href="#venditore-info" data-toggle="tab"><i class="fa fa-user"></i> dettagli account venditore</a>
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
                                            @if(!$isvendor)
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
                                                            <th>Action</th>
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
                                                                    <td>
                                                                        Letto
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ url('/accountArea') }}" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                @else
                                                                    <td>
                                                                        Non letto
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('notificaLetta', ['id' => $notification->id]) }}" class="btn btn-sqr">View</a>
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
                                                <h5>Non sono ancora stati inseriti metodi di pagamento dall'utente</h5>
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
                                                            <th>Stato</th>
                                                            <th>Totale</th>
                                                            <th>Azione</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($orders as $order)
                                                            <tr>
                                                                <td>{{ $order->id }}</td>
                                                                <td>{{ substr($order->date, 0,10) }}</td>
                                                                <td>{{ $order->state }}</td>
                                                                <td>€ {{ $order->total }}</td>
                                                                <td><a href="{{ route('orderDetail', ['id' => $order->id]) }}" class="btn btn-sqr">View</a>
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

                                                    <form method="POST" action="{{ route('change.email') }}">
                                                        <fieldset>
                                                            <div class="single-input-item">
                                                                <label for="email" class="required">Indirizzo Email</label>
                                                                <input type="email" id="email" name="email" required autocomplete="email" placeholder={{$user->email}} />
                                                                <input type="email" id="newEmail" name="newEmail" required autocomplete="newEmail" placeholder= 'inserire nuova e-mail' />
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button type="submit" class="btn btn-sqr">Cambia E-mail</button>
                                                        </div>
                                                    </form>

                                                    <div class="mt-5"></div>
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
                                    </div> <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="venditore-info" role="tabpanel">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Comic</th>
                                            <th>Quantità</th>
                                            <th>Acquirente</th>
                                            <th>Stato</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <h5>Dashboard in allestimento</h5>
                                </div>
                                    <!-- Single Tab Content End -->
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- my account wrapper end -->