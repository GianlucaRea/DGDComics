<!-- succes-area-start -->
<div class="contact-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="contact-info">
                    <h3>Pagina in allestimento</h3>
                    @foreach($order as $orderDetail)
                    <h4>per ora vi basti sapere che questa è la pagina dell'ordine numero {{ $orderDetail->id }}</h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- succes-area-end -->