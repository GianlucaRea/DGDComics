 <div class="col-lg-3 col-md-12 col-12 order-lg-1 order-2 mt-sm-50 mt-xs-40">
                <div class="shop-left">
                    <div class="section-title-5 mb-30">
                        <h2>Opzioni</h2>
                    </div>
                    <div class="left-title mb-20">
                        <h4>Categoria</h4>
                    </div>
                    <div class="left-menu mb-30">
                        <ul>
                            <li><a href="#">Shonen<span></span></a></li>
                            <li><a href="#">Seinen<span></span></a></li>
                            <li><a href="#">Shojo<span></span></a></li>
                            <li><a href="#">Josei<span></span></a></li>
                            <li><a href="#">Dc<span></span></a></li>
                            <li><a href="#">Marvel<span></span></a></li>
                            <li><a href="#">Italiano<span></span></a></li>
                            <li><a href="#">Other<span></span></a></li>
                        </ul>
                    </div>
                    <div class="left-title mb-20">
                        <h4>Genere</h4>
                    </div>
                    <div class="left-menu mb-30">
                        <ul>
                            @foreach($genres as $genre)
                                <li><a href="#">{{$genre->name_genre }}<span>(15)</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="left-title mb-20">
                        <h4>Prezzo</h4>
                    </div>
                    <div class="left-menu mb-30">
                        <ul>
                            <li><a href="#">€0.00-€2.49<span>(1)</span></a></li>
                            <li><a href="#">€2.50-€4.99<span>(11)</span></a></li>
                            <li><a href="#">€5.00-€7.49<span>(2)</span></a></li>
                            <li><a href="#">€7.50-€9.99<span>(3)</span></a></li>
                            <li><a href="#">€10.00 +<span>(1)</span></a></li>
                        </ul>
                    </div>
                </div>
 </div>