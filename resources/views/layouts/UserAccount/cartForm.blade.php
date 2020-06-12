<!-- entry-header-area-start -->
<div class="entry-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="entry-header-title">
                    <h2>Carrello</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- entry-header-area-end -->
<!-- cart-main-area-start -->
<div class="cart-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-cart table-responsive mb-15">
                    <table>
                        <thead>
                        <tr>
                            <th class="product-thumbnail">immagine</th>
                            <th class="product-name">nome fumetto</th>
                            <th class="product-seller">venditore</th>
                            <th class="product-price">prezzo</th>
                            <th class="product-quantity">quantità</th>
                            <th class="product-subtotal">totale</th>
                            <th class="product-remove">Rimuovi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($total = 0)
                        @php($sellers = collect())
                        @if(session('cart'))
                            @php($cart = session()->get('cart'))
                            @php($sessions = \Illuminate\Support\Facades\DB::table('sessions')->get())
                            @foreach($sessions as $session)
                                @php($user = \Illuminate\Support\Facades\Auth::user())
                                @if($cart[$session->sessionId]['user'] == $user->id)
                                @php($subtotal = $cart[$session->sessionId]['price'] * $cart[$session->sessionId]['quantity'])
                                @php($total += $cart[$session->sessionId]['price'] * $cart[$session->sessionId]['quantity'])
                                @php($comic = \App\Http\Controllers\ComicController::getByID($cart[$session->sessionId]["comic_id"]))
                                @php($seller = \App\Http\Controllers\ComicController::getSeller($comic->id))
                                @if($sellers->isEmpty())
                                    @php($sellers->push($seller->id))
                                @else
                                    @if(!($sellers->contains($seller->id)))
                                        @php($sellers->push($seller->id))
                                    @endif
                                @endif

                                <tr>
                                    <td class="product-thumbnail"><a href="{{ url('/comic_detail/'.$comic->id) }}"><img src="{{asset('img/comicsImages/' . $cart[$session->sessionId]['image']) }}" alt="man" /></a></td>
                                    <td class="product-name">{{ $cart[$session->sessionId]['name']}}</td>
                                    <td class="product-seller">{{ $seller->username }}</td>
                                    <td class="product-price"><span class="amount">{{ $cart[$session->sessionId]['price'] }}</span></td>
                                    <form></form>
                                    <td class="product-quantity">
                                        <form action="{{url('update-cart/'.$cart[$session->sessionId]["comic_id"]) }}">
                                            <input type="number" name="qty" id="qty" min="1" max="{{$comic->quantity + $cart[$session->sessionId]['quantity']}}" value="{{ $cart[$session->sessionId]['quantity'] }}">
                                            <div class="mb-2"></div>
                                            <button type="submit">modifica</button>
                                        </form>
                                    </td>
                                    <td class="product-subtotal">{{ $subtotal }}</td>
                                    <td class="product-remove"><a href="{{url('remove-from-cart/'.$cart[$session->sessionId]["comic_id"]) }}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @endif
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ Route('submitOrder') }}">
            @csrf
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="buttons-cart mb-30">
                        <ul>
                            <li><a href="{{ url('remove-all') }}">Svuota carrello</a></li>
                            <li><a href="{{ url('/') }}">Torna al negozio</a></li>
                        </ul>
                    </div>

                    <div class="toolbar-sorter2">
                        @php($user = \Illuminate\Support\Facades\Auth::user())
                        @php($shippingAddresses = \App\Http\Controllers\ShippingAddressController::getShippingAddressByUserId($user->id))

                        @if($shippingAddresses->count() < 1)
                            <h4>Indirizzo di spedizione</h4>
                            <p>non hai indirizzi di spedizione validi, vai nella sezione account ed aggiungine uno</p>
                        @else
                            <h4>Indirizzo di spedizione</h4>
                            <select name="shippingAddress" id="shippingAddress" class="sorter-options2" data-role="sorter">

                                @foreach($shippingAddresses as $shippingAddress)
                                    @if($shippingAddress->favourite != 0)
                                        <option value='{{$shippingAddress->id}}'>{{ $shippingAddress->via }} {{ $shippingAddress->civico }}, {{ $shippingAddress->città }} ({{ $shippingAddress->post_code }})</option>
                                    @endif
                                @endforeach

                                @foreach($shippingAddresses as $shippingAddress)
                                    @if($shippingAddress->favourite != 1)
                                        <option value='{{$shippingAddress->id}}'>{{ $shippingAddress->via }} {{ $shippingAddress->civico }}, {{ $shippingAddress->città }} ({{ $shippingAddress->post_code }})</option>
                                    @endif
                                @endforeach

                            </select>
                        @endif
                    </div>

                    <div class="mb-5"></div>

                    <div class="toolbar-sorter2">
                        @php($user = \Illuminate\Support\Facades\Auth::user())
                        @php($paymentMethods = \App\Http\Controllers\PaymentMethodController::getPaymentMethodByUserId($user->id))
                        @php($oggi = \App\Http\Controllers\PaymentMethodController::getTime())

                        @if($paymentMethods->count() < 1)
                            <h4>Medoto di pagamento</h4>
                            <p>non hai metodi di pagamento validi, vai nella sezione account ed aggiungine uno</p>
                        @else
                            <h4>Metodo di pagamento</h4>
                            <select name="paymentMethod" id="paymentMethod" class="sorter-options2" data-role="sorter">

                                @foreach($paymentMethods as $paymentMethod)
                                    @if($paymentMethod->favourite != 0)
                                        @php($dataScadenza = $paymentMethod->data_scadenza)
                                        @php($scadenza = strtotime($dataScadenza))
                                        @if($scadenza - $oggi > 0)
                                            @php($last_four_digits = substr($paymentMethod->cardNumber, 12, 16))
                                            <option value='{{$paymentMethod->id}}'>{{ $paymentMethod->payment_type }}, ****-****-****-{{ $last_four_digits }}, {{ substr($paymentMethod->data_scadenza, 0,7) }}, {{ $paymentMethod->intestatario }}</option>
                                        @endif
                                    @endif
                                @endforeach


                                @foreach($paymentMethods as $paymentMethod)
                                    @if($paymentMethod->favourite != 1)
                                        @php($dataScadenza = $paymentMethod->data_scadenza)
                                        @php($scadenza = strtotime($dataScadenza))
                                        @if($scadenza - $oggi > 0)
                                            @php($last_four_digits = substr($paymentMethod->cardNumber, 12, 16))
                                            <option value='{{$paymentMethod->id}}'>{{ $paymentMethod->payment_type }}, ****-****-****-{{ $last_four_digits }}, {{ substr($paymentMethod->data_scadenza, 0,7) }}, {{ $paymentMethod->intestatario }}</option>
                                        @endif
                                    @endif
                                @endforeach

                            </select>
                        @endif
                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart_totals">
                        <h2>Totale del carrello</h2>
                        <table>
                            <tbody>
                            <tr class="cart-subtotal">
                                <th>Subtotale</th>
                                <td>
                                    <span class="amount">€ {{ $total }}</span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal">
                                @if($total > 0 && $total < 20)
                                    <th>Costi di spedizione</th>
                                    <td>
                                        <span class="amount">€ {{$sellers->count() * 5}}</span>
                                    </td>
                                @else
                                    @if($total == 0)
                                        <th>Costi di spedizione</th>
                                        <td>
                                            <span class="amount">€ {{$sellers->count() * 5}}</span>
                                        </td>
                                    @endif
                                    @if($total > 20)
                                        <th>Spedizione Gratuita per ordini maggiori di 20€ </th>
                                        <td>
                                            <span class="amount">€ 0</span>
                                        </td>
                                    @endif
                                @endif
                            </tr>
                            <tr class="order-total">
                                <th>Totale</th>
                                <td>
                                    @if($total>0 && $total <20)
                                        <strong>
                                            @php($total += $sellers->count() * 5 )
                                            <span class="amount">€ <input type="number" name="total" id="total"  class="totalNumber" value="{{ $total }}" readonly></span>
                                        </strong>
                                    @else
                                        <strong>
                                            <span class="amount">€ <input type="number" name="total" id="total"  class="totalNumber" value="{{ $total }}" readonly></span>
                                        </strong>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="wc-proceed-to-checkout">
                            <button type="submit" class="btn btn-sqr" >Procedi all'acquisto </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- cart-main-area-end -->