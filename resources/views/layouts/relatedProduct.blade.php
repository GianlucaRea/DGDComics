<!-- new-book-area-start -->

<div class="col-lg-3 col-md-12 col-12 order-lg-2 order-2">
    <div class="shop-left">
        @if($related->count() == 0)
            <div class="left-title mb-20">
                <h4>Non ci sono Correlati</h4>
            </div>
        @else
            <div class="left-title mb-20">
                <h4>Correlati</h4>
            </div>
        <div class="random-area mb-30">
            <div class="product-active-2 owl-carousel">
                <div class="product-total-2">
                    
                    <div class="single-most-product bd mb-18">
                        <div class="most-product-img">
                            <a href="#"><img src="{{asset('img/product/20.jpg')}}" alt="book" /></a>
                        </div>
                        <div class="most-product-content">
                            <div class="product-rating">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h4><a href="#">Endeavor Daytrip</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$30.00</li>
                                    <li class="old-price">$33.00</li>
                                </ul>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
        @endif
    </div>
</div>
