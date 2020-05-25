<!-- entry-header-area-start -->
<div class="entry-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="entry-header-title">
                    <h2>Admin</h2>
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
                                    <a href="#users" data-toggle="tab"><i class="fa fa-user"></i>Gestione Utenti</a>
                                    <a href="#comics" data-toggle="tab"><i class="fa fa-book"></i>Gestione Fumetti</a>
                                    <a href="#reviews" data-toggle="tab"><i class="fa fa-map-marker"></i>Gestione Recensione</a>
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
                                        </div>
                                        <div class="myaccount-content">
                                            @php
                                                $notifications = \App\Http\Controllers\NotificationController::getNotification($user->id);
                                            @endphp
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
                                    <div class="tab-pane fade" id="users" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h5>Utenti</h5>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>Nickname</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Modifica</th>
                                                        <th>Elimina</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user->username}}</td>
                                                        <td>{{$user->phone_number}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td><a href="" class="fa fa-check"></a></td>
                                                        <td><a href="cart.html" class="fa fa-remove"></a></td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->



                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="comics" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h5>Fumetti</h5>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th>Titolo</th>
                                                        <th>ISBN</th>
                                                        <th>Quantità</th>
                                                        <th>Utente</th>
                                                        <th>Modifica</th>
                                                        <th>Elimina</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($comics as $comic)
                                                        @php
                                                            $userNeed = App\User::where('id','=',$comic->user_id)->first();
                                                        @endphp
                                                        <tr>
                                                            <td>{{$comic->comic_name}}</td>
                                                            <td>{{$comic->ISBN}}</td>
                                                            <td>{{$comic->quantity}}</td>
                                                            <td>{{$userNeed->username}}</td>
                                                            <td><a href="" class="fa fa-check"></a></td>
                                                            <td><a href="cart.html" class="fa fa-remove"></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h5>Recensione</h5>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th>Titolo</th>
                                                        <th>Fumetto</th>
                                                        <th>Recensore</th>
                                                        <th>Elimina</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($reviews as $review)
                                                        @php
                                                            $userReview = App\User::where('id','=',$review->user_id)->first();
                                                            $comicReview = App\Comic::where('id','=',$review->comic_id)->first();
                                                        @endphp
                                                        <tr>
                                                            <td>{{$review->review_title}}</td>
                                                            <td>{{$comicReview->comic_name}}</td>
                                                            <td>{{$userReview->username}}</td>
                                                            <td><a href="cart.html" class="fa fa-remove"></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Indirizzo Email</label>
                                                        <input type="email" id="email" placeholder={{$user->email}} />
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
