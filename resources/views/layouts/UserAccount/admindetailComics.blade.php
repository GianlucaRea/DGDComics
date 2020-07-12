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
                                <div class="myaccount-tab-menu nav" role="tablist" id="myTab">
                                    <a href="{{route('admindashboard')}}" class="{{ (Route::currentRouteName() == 'admindashboard') ? 'active' : '' }}" ><i class="fa fa-dashboard"></i>Dashboard</a>
                                    <a href="{{route('adminusers')}}" class="{{ (Route::currentRouteName() == 'adminusers') ? 'active' : '' }}" ><i class="fa fa-user"></i>Gestione Utenti</a>
                                    <a href="{{route('admincomics')}}" class="{{ (Route::currentRouteName() == 'admincomics') ? 'active' : '' }}" code><i class="fa fa-book"></i>Gestione Fumetti</a>
                                    <a href="{{route('adminreviews')}}" class="{{ (Route::currentRouteName() == 'adminreviews') ? 'active' : '' }}"><i class="fa fa-map-marker"></i>Gestione Recensione</a>
                                    <a href="{{route('adminarticles')}}" class="{{ (Route::currentRouteName() == 'adminarticles') ? 'active' : '' }}"><i class="fa fa-pencil"></i>Gestione Articoli</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show {{ (Route::currentRouteName() == 'admindashboard') }}" id="dashboad" role="tabpanel">
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
                                @if(session('message'))
                                    {{session('message')}}
                                @endif
                                <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show {{ (Route::currentRouteName() == 'adminusers')}}" id="users" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h5>Utenti</h5>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>Nickname</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Tipologia</th>
                                                        <th>Elimina</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td>{{$user->username}}</td>
                                                            <td>{{$user->phone_number}}</td>
                                                            <td>{{$user->email}}</td>
                                                            @if($user->hasGroup('il gruppo degli utenti'))
                                                                <td>Utente</td>
                                                            @else
                                                                <td>Venditore</td>
                                                            @endif
                                                            <td><a class="btn btn-danger" onclick="return deleteUser();"  href="{{route('user-delete', $user->id)}}"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    {{ $users->links() }}
                                                    </tbody>
                                                </table>
                                                @foreach($users as $user)
                                                @endforeach
                                                {{ $users->links() }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->



                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show {{ (Route::currentRouteName() == 'admincomics') }} active" id="comics" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h5>Fumetti</h5>
                                            <div class="blog-left-title">
                                                <h3>Search</h3>
                                            </div>
                                            <div class="side-form">
                                                <form action="{{ route('searchcomicsrouteAdminPanel') }}">
                                                    <input type="text" name="search" placeholder="Cerca un fumetto in base al titolo, la descrizione, il venditore etc..." />
                                                    <a  href="javascript:;" onclick="parentNode.submit();"><i class="fa fa-search"></i></a>
                                                </form>
                                            </div>
                                            <div class="mt-3"></div>
                                            <div class="myaccount-table table-responsive text-center">
                                                @if($comics->count()>0)
                                                    <table class="table table-bordered mt-2">
                                                        <thead class="thead-dark">
                                                        <tr>
                                                            <th>Titolo</th>
                                                            <th>ISBN</th>
                                                            <th>Prezzo</th>
                                                            <th>Quantità</th>
                                                            <th>Venditore</th>
                                                            <th>Consigliato</th>
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
                                                                <td>{{$comic->price}} €</td>
                                                                <td>{{$comic->quantity}}</td>
                                                                <td>{{$userNeed->username}}</td>
                                                                @if($comic->suggest == true)
                                                                    <td><a class="btn" href="{{ url('suggestComic', $comic->id) }}"> <i class="fa fa-star"></i></a></td>
                                                                @else
                                                                    <td><a class="btn" href="{{ url('suggestComic', $comic->id) }}"> <i class="fa fa-star-o"></i></a></td>
                                                                @endif
                                                                <td><a class="btn btn-danger" onclick="return deleteComic();"  href="{{route('comic-delete', $comic->id)}}"><i class="fa fa-trash"></i></a></td>
                                                            </tr>
                                                        @endforeach
                                                        {{ $comics->links() }}
                                                        </tbody>
                                                    </table>
                                                    @foreach($comics as $comic)
                                                    @endforeach
                                                    {{ $comics->links() }}
                                            </div>
                                        </div>
                                        @else
                                            <h3>nessun risultato di ricerca</h3>
                                    </div>
                                </div>
                                @endif
                                <div class="mt-3"></div>
                                <div class="row">
                                    <div class="col-lg-10"></div>
                                    <div style="margin-right: 2.75%"></div>
                                    <div class="col-lg-1">
                                        <div class="buttons-back">
                                            <a href="{{url('/adminArea/comics')}}">Indietro</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show {{ (Route::currentRouteName() == 'adminreviews') }}" id="reviews" role="tabpanel">
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
                                                    <td><a class="btn btn-danger" onclick="return deleteReview();"  href="{{route('review-delete-local', $review->id)}}"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            @endforeach
                                            {{ $reviews->links() }}
                                            </tbody>
                                        </table>
                                        @foreach($reviews as $review)
                                            @php
                                                $userReview = App\User::where('id','=',$review->user_id)->first();
                                                $comicReview = App\Comic::where('id','=',$review->comic_id)->first();
                                            @endphp
                                        @endforeach
                                        {{ $reviews->links() }}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show {{ (Route::currentRouteName() == 'adminarticles') }}" id="articles" role="tabpanel">
                                <div class="myaccount-content">
                                    <h5>Articoli</h5>
                                    <div class="blog-left-title">
                                        <h3>Search</h3>
                                    </div>
                                    <div class="side-form">
                                        <form action="{{ route('searcharticlerouteAdminPanel') }}">
                                            <input type="text" name="search" placeholder="Cerca un articolo..." />
                                            <a  href="javascript:;" onclick="parentNode.submit();"><i class="fa fa-search"></i></a>
                                        </form>
                                    </div>
                                    <div class="mt-3"></div>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>Titolo</th>
                                                <th>Testo</th>
                                                <th>Elimina</th>
                                                <th>Modifica</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($articles as $article)
                                                <tr>
                                                    <td>{{$article->title}}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($article->article_text, 45, $end='...') }}</td>
                                                    <td>
                                                        <a class="btn btn-danger" onclick="return deleteArticle();"  href="{{route('article-delete', $article->id)}}"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-light" href="{{route('article-modify', $article->id)}}"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{ $articles->links() }}
                                            </tbody>
                                        </table>
                                        {{ $articles->links() }}
                                    </div>
                                </div>
                                <div class="mt-3"></div>
                                <div class="row">
                                    <div class="col-lg-10"></div>
                                    <div style="margin-right: 2.75%"></div>
                                    <div class="col-lg-1">
                                        <div class="buttons-back">
                                            <a href="{{url('/adminArea/articles')}}">Indietro</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- My Account Tab Content End -->
                </div>
            </div> <!-- My Account Page End -->
        </div>
    </div>
</div>
</div>
</div>

<script>
    function deleteUser() {
        if(!confirm("Sei sicuro di voler eliminare questo utente?"))
            event.preventDefault();
    }
    function deleteReview() {
        if(!confirm("Sei sicuro di voler eliminare questa recensione?"))
            event.preventDefault();
    }
    function deleteComic() {
        if(!confirm("Sei sicuro di voler eliminare questo fumetto?"))
            event.preventDefault();
    }
    function deleteArticle() {
        if(!confirm("Sei sicuro di voler eliminare questo articolo dal Blog?"))
            event.preventDefault();
    }
</script>
