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
                <form action="#">
                    <div class="table-content table-responsive mb-15 border-1">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-thumbnail">immagine</th>
                                <th class="product-name">nome fumetto</th>
                                <th class="product-price">prezzo</th>
                                <th class="product-quantity">quantità</th>
                                <th class="product-subtotal">totale</th>
                                <th class="product-remove">Rimuovi</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php($total = 0)
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    @php($subtotal = $details['price'] * $details['quantity'])
                                    @php($total += $details['price'] * $details['quantity'])
                            <tr>
                                <td class="product-thumbnail"><a href="#"><img src="{{asset('img/comicsImages/' . $details['image']) }}" alt="man" /></a></td>
                                <td class="product-name">{{ $details['name']}}</td>
                                <td class="product-price"><span class="amount">{{ $details['price'] }}</span></td>
                                <td class="product-quantity"><input type="number" id="qty" value="{{ $details['quantity'] }}"></td>
                                <td class="product-subtotal">{{ $subtotal }}</td>
                                <td class="product-remove"><a href="{{url('remove-from-cart/'.$id) }}"><i class="fa fa-times"></i></a></td>
                            </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="buttons-cart mb-30">
                    <ul>
                        <li><a href="{{ url('/cart') }}">aggiorna carrello</a></li>
                        <li><a href="{{ url('/') }}">Continua a comprare</a></li>
                    </ul>
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
                            <th>Subtotale</th>
                            <td>
                                <span class="amount">€5 </span>
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th>Total</th>
                            <td>
                                <strong>
                                    <span class="amount">{{ $total + 5 }}</span>
                                </strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="wc-proceed-to-checkout">
                        <a href="#">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- cart-main-area-end -->