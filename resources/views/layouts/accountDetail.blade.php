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
                                                <p>Hello, <strong>{{ $user->username }}</strong> (If Not <strong>{{ $user->username }}
                                                        </strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                            </div>
                                            <p class="mb-0">I tuoi dati:</p>
                                            <p class="mb-0">E-mail:   <strong>{{ $user->email }} </strong></p>
                                            <p class="mb-0">Telefono: <strong>{{ $user->phone_number }} </strong></p>
                                            <p class="mb-0">Vuoi diventare venditore?  <a href="#" class="logout"> Clicca qui</a></p>
                                        </div>
                                        <div class="myaccount-content">
                                            @php
                                                $notifications = \App\Http\Controllers\NotificationController::getNotification($user->id);
                                            @endphp
                                            <h5>Notifiche</h5>
                                            @if($notifications->count() < 1)
                                                <div class="myaccount-content">
                                                    <h5>NON C'E ROBA BRO</h5>
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
                                                            <td>{{ $notification->date }}</td>
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
                                        <div class="myaccount-content">
                                            <h5>Orders</h5>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Aug 22, 2018</td>
                                                        <td>Pending</td>
                                                        <td>$3000</td>
                                                        <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>July 22, 2018</td>
                                                        <td>Approved</td>
                                                        <td>$200</td>
                                                        <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>June 12, 2017</td>
                                                        <td>On Hold</td>
                                                        <td>$990</td>
                                                        <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->



                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                        @php
                                            $paymentMethods = \App\Http\Controllers\PaymentMethodController::getPaymentMethodByUserId($user->id);
                                        @endphp

                                        @if($paymentMethods->count() < 1)
                                            <div class="myaccount-content">
                                                <h5>Non sono ancora stati inseriti metodi di pagamento dall'utente</h5>
                                            </div>
                                        @endif

                                        @foreach($paymentMethods as $paymentMethod)
                                            @if($paymentMethod->favourite != 0)
                                                    <div class="myaccount-content">
                                                        <h5>I TUOI METODI DI PAGAMENTO</h5>
                                                        <address>
                                                            <h6>PREDEFINITO</h6>
                                                            <p><strong>{{ $paymentMethod->payment_type }}</strong></p>
                                                        </address>
                                                        <a href="#" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                            Rimuovi metodo di pagamento</a>
                                                    </div>
                                            @endif
                                        @endforeach

                                        @foreach($paymentMethods as $paymentMethod)
                                            @if($paymentMethod->favourite != 1)
                                                <div class="myaccount-content">
                                                    <address>
                                                        <p><strong>{{ $paymentMethod->payment_type }}</strong></p>
                                                    </address>
                                                    <a href="#" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                        Rimuovi metodo di pagamento</a>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="mt-20"></div>
                                        <a href="#" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                            Aggiungi metodo di pagamento</a>

                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        @php
                                            $shippingAddresses = \App\Http\Controllers\ShippingAddressController::getShippingAddressByUserId($user->id);
                                        @endphp
                                        @if($shippingAddresses->count() < 1)
                                            <div class="myaccount-content">
                                                <h5>Non sono ancora stati inseriti indirizzi di spedizione dall'utente</h5>
                                            </div>
                                        @endif

                                        @foreach($shippingAddresses as $shippingAddress)
                                            @if($shippingAddress->favourite != 0)
                                                <div class="myaccount-content">
                                                    <h5>I TUOI INDIRIZZI</h5>
                                                    <address>
                                                        <h6>PREDEFINITO</h6>
                                                        <p><strong>{{ $shippingAddress->città }} </strong> <strong>{{ $shippingAddress->post_code }}</strong></p>
                                                        <p><strong>{{ $shippingAddress->via }}</strong> <strong>{{ $shippingAddress->civico }}</strong></p>
                                                        <p><strong>{{ $shippingAddress->other_info }} </strong></p>
                                                    </address>
                                                    <a href="#" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                        Rimuovi indirizzo di spedizione</a>
                                                </div>
                                            @endif
                                        @endforeach

                                        @foreach($shippingAddresses as $shippingAddress)
                                            @if($shippingAddress->favourite != 1)
                                              <div class="myaccount-content">
                                                    <address>
                                                        <p><strong>{{ $shippingAddress->città }} </strong> <strong>{{ $shippingAddress->post_code }}</strong></p>
                                                        <p><strong>{{ $shippingAddress->via }}</strong> <strong>{{ $shippingAddress->civico }}</strong></p>
                                                        <p><strong>{{ $shippingAddress->other_info }} </strong></p>
                                                    </address>
                                                  <a href="#" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                      Rimuovi indirizzo di spedizione</a>
                                               </div>
                                            @endif
                                        @endforeach

                                        <div class="mt-20"></div>
                                        <a href="#" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                            Aggiungi metodo di pagamento</a>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h5>Account Details</h5>
                                            <div class="account-details-form">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="first-name" class="required">First
                                                                    Name</label>
                                                                <input type="text" id="first-name" placeholder={{$user->name}} />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">Last
                                                                    Name</label>
                                                                <input type="text" id="last-name" placeholder={{$user->surname}} />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="display-name" class="required">Display Name</label>
                                                        <input type="text" id="display-name" placeholder={{$user->username}} />
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Email Address</label>
                                                        <input type="email" id="email" placeholder={{$user->email}} />
                                                    </div>
                                                    <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="single-input-item">
                                                            <label for="current-pwd" class="required">Current
                                                                Password</label>
                                                            <input type="password" id="current-pwd" placeholder="Current Password" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">New
                                                                        Password</label>
                                                                    <input type="password" id="new-pwd" placeholder="New Password" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">Confirm
                                                                        Password</label>
                                                                    <input type="password" id="confirm-pwd" placeholder="Confirm Password" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item">
                                                        <button class="btn btn-sqr">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
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