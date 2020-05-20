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
                            @foreach(session('cart') as $id => $details)
                                @php($subtotal = $details['price'] * $details['quantity'])
                                @php($total += $details['price'] * $details['quantity'])
                                @php($comic = \App\Http\Controllers\ComicController::getByID($id))
                                @php($seller = \App\Http\Controllers\ComicController::getSeller($comic->id))
                                @if($sellers->isEmpty())
                                    @php($sellers->push($seller->id))
                                @else
                                    @if(!($sellers->contains($seller->id)))
                                        @php($sellers->push($seller->id))
                                    @endif
                                @endif

                                <tr>
                                    <td class="product-thumbnail"><a href="{{ url('/comic_detail/'.$comic->id) }}"><img src="{{asset('img/comicsImages/' . $details['image']) }}" alt="man" /></a></td>
                                    <td class="product-name">{{ $details['name']}}</td>
                                    <td class="product-seller">{{ $seller->name }} {{ $seller->surname }}</td>
                                    <td class="product-price"><span class="amount">{{ $details['price'] }}</span></td>
                                    <form></form>
                                    <td class="product-quantity">
                                        <form action="{{url('update-cart/'.$id) }}">
                                            <input type="number" name="qty" id="qty" min="1" max="{{$comic->quantity + $details['quantity']}}" value="{{ $details['quantity'] }}">
                                            <div class="mb-2"></div>
                                            <button type="submit">modifica</button>
                                        </form>
                                    </td>
                                    <td class="product-subtotal">{{ $subtotal }}</td>
                                    <td class="product-remove"><a href="{{url('remove-from-cart/'.$id) }}"><i class="fa fa-times"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="buttons-cart mb-30">
                    <ul>
                        <li><a href="{{ url('remove-all') }}">Svuota carrello</a></li>
                        <li><a href="{{ url('/') }}">Torna al negozio</a></li>
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
                                <th>Spedizione Gratuita per ordini maggiori di 20€ </th>
                                    <td>
                                        <span class="amount">€ 0</span>
                                    </td>
                            @endif
                        </tr>
                        <tr class="order-total">
                            <th>Totale</th>
                            <td>
                                @if($total>0 && $total <20)
                                    <strong>
                                        <span class="amount">€ {{ $total + $sellers->count() * 5 }}</span>
                                    </strong>
                                @else
                                    <strong>
                                        <span class="amount">€ {{ $total }}</span>
                                    </strong>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="wc-proceed-to-checkout">
                        <a href="#">procedi all'acquisto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- cart-main-area-end -->