<!--product info area start-->
<div class="product-info-area mt-80">
    <div class="tab-content border-0">
        <div class="tab-pane fade show active" id="Details">
            <div class="valu">
                <ul>
                    <li><i class="fa fa-circle"></i>ISBN: {{ $comic->ISBN }}</li>
                    <li><i class="fa fa-circle"></i>Adjustable shoulder strap.</li> <!-- i model e l'ER mi sembra non siano aggiornati, da completare-->
                    <li><i class="fa fa-circle"></i>Full-length zipper.</li>
                    @if($comic->length != null)
                    <li><i class="fa fa-circle"></i>L {{$comic->length}} cm x W {{$comic->width}} cm x H {{$comic->height}} cm.</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<!--product info area end-->
