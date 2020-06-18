<!-- footer-area-start -->
    <!-- footer-top-start -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-top-menu bb-2">
                        <nav>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</li>
                                <li><a href="{{url('/privacypolicy')}}">Privacy e policy</a></li>
                                <li><a href="{{ url('/contact') }}">Contattaci</a></li>
                                <li><a href="{{ url('blog') }}">Blog</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-top-start -->
    <!-- footer-mid-start -->
    <div class="footer-mid ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-footer br-2 xs-mb">
                                <div class="footer-title mb-20">
                                    <h3>Products</h3>
                                </div>
                                <div class="footer-mid-menu">
                                    <ul>
                                        <li><a href="{{ url('/aboutUs') }}">About us</a></li>
                                        <li><a href="{{url('/shoplist/search?sorter=created_at')}}">Gli ultimi arrivi</a></li>
                                        <li><a href="{{route('sconto')}}">Gli sconti migliori</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-footer br-2 xs-mb">
                                <div class="footer-title mb-20">
                                    <h3>La nostra compagnia</h3>
                                </div>
                                <div class="footer-mid-menu">
                                    <ul>
                                        <li><a href="{{ url('/contact') }}">Contattaci</a></li>
                                        <li><a href="{{url('/shops') }}">Stores</a></li>
                                        @if (Route::has('login'))
                                            @auth
                                                <li><a href="{{ url('/accountArea') }}">Account</a></li>
                                                <li><a href="{{ url('/logout') }}">logout</a></li>
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
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-footer br-2 xs-mb">
                                <div class="footer-title mb-20">
                                    <h3>Vendi su DGDcomics</h3>
                                </div>
                                <div class="footer-mid-menu">
                                    <ul>
                                        <li><a href="{{url('/info')}}">Come funziona</a></li>
                                        <li><a href="{{url('/sellyourcomics')}}">Diventa un venditore su DGDcomics</a></li>
                                        <li><a href="{{url('/regulation')}}">Regolamento</a></li>
                                        <li><a href="{{url('/contract_terms')}}">Termini di contratto</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="single-footer mrg-sm">
                        <div class="footer-title mb-20">
                            <h3>Le nostre informazioni!</h3>
                        </div>
                        <div class="footer-contact">
                            <p class="adress">
                                <span>DGDcomics</span>
                                Coppito Via vetoio (AQ)
                            </p>
                            <p><span>Chiamaci adesso:</span> (+39)000 850 4889</p>
                            <p><span>Email:</span> DGDcomics@support.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-mid-end -->
    <!-- footer-bottom-start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row bt-2">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="copy-right-area">
                        <p>Copyright ©DGDcomics . Tutti i diritti riservati.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="payment-img text-right">
                        <img src="{{asset('img/1.png')}}" alt="payment" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom-end -->
<!-- footer-area-end -->