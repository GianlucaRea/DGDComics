<!--review area start-->
<div class="product-info-area mt-80">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
        <!-- tab-menu-start -->
                <div class="tab-menu mb-40 text-center">
                    <ul class="nav justify-content-center">
                        <li><a class="active" href="#review" data-toggle="tab">Recensioni</a></li>
                        <li><a href="#addreview" data-toggle="tab">Scrivi una Recensione</a></li>
                    </ul>
                </div>
            </div>
        <!-- tab-menu-end -->
        </div>

        <div class="tab-content">
        <div class="tab-pane fade show active" id="review">
            <div class="valu">
                <div class="section-title mb-25 mt-25">
                    @if($reviews->count() > 0)
                        <center><h2>Recensioni</h2></center>
                    @elseif($reviews->count() <= 0)
                        <center><h2>Non ci sono Recensioni</h2></center>
                    @endif
                </div>
                <style>
                    ul#menu li {
                        display:inline;
                    }
                </style>
                <ul>
                    @foreach($reviews4 as $review)
                    <li style="width:310px; display:inline; float:left;">
                        <div class="review-title mb-25 mt-25">
                            <h3>{{$review->review_title}}</h3>
                        </div>
                        <div class="review-rating">
                            <div class="rating-result">

                                @php($stars = $review->stars)
                                @foreach(range(1,5) as $i)
                                    @if($stars >0)
                                        @if($stars >0.5)
                                            <a><i class="fa fa-star"></i></a>
                                        @else
                                            <a><i class="fa fa-star-half-o"></i></a>
                                        @endif
                                    @else
                                        <a><i class="fa  fa-star-o"></i></a>
                                    @endif
                                    <?php $stars--; ?>
                                @endforeach

                            </div>
                            <br>
                            <div class="review-details">
                                <textarea rows="5" cols="20" style="width: 150px" readonly> {{$review->review_text}}</textarea>
                                <br>
                                  @php($userR = \App\Http\Controllers\UserController::getUserId($review->user_id))
                                  @php($username = $userR->username)
                                <p class="review-author">Review by {{$username}}</p>
                                <p class="review-date">Posted on {{\Carbon\Carbon::parse($review->review_date)->format('d/m/Y')}} </p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

        <div class="tab-content ">
        <div class="tab-pane fade" id="addreview">
            <div class="review-add">
                <center><h3>Stai recensendo:</h3>
                <h4>Joust Duffle Bag</h4></center>
            </div>
            <div class="review-field-ratings">
                <span>Your Rating <sup>*</sup></span>
                <div class="control">
                    <div class="single-control">
                        <span>Stars</span>
                        <div class="review-control-vote">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-form ">
                <div class="single-form">
                    <label>Nickname <sup>*</sup></label>
                    <form action="#">
                        <input type="text" />
                    </form>
                </div>
                <div class="single-form single-form-2">
                    <label>Titolo <sup>*</sup></label>
                    <form action="#">
                        <input type="text" />
                    </form>
                </div>
                <div class="single-form">
                    <label>Recensione <sup>*</sup></label>
                    <form action="#">
                        <textarea name="massage" cols="10" rows="4"></textarea>
                    </form>
                </div>
            </div>
            <div class="review-form-button">
                <a href="#">Invia recensione</a>
            </div>
        </div>
    </div>
    </div>
</div>
<!--review area end-->