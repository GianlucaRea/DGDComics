<center><h1>{{$user->name}} {{$user->surname}}</h1></center>
<div class="product-info-main">
<center>Media delle Recesioni  : @foreach(range(1,5) as $i)
        @if($ranking->avg_stars >0)
            @if($ranking->avg_stars >0.5)
                <a><i class="fa fa-star fa_custom"></i></a>
            @else
                <a><i class="fa fa-star-half-o fa_custom"></i></a>
            @endif
        @else
            <a><i class="fa  fa-star-o fa_custom"></i></a>
        @endif
        <?php $ranking->avg_stars--; ?>
    @endforeach</center>
<center>Totale Recensioni: {{$ranking->feedback_number}}</center>
<center>Totale Prodotti Venduti : {{$ranking->number_selling_products}}</center>
</div>