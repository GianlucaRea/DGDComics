<div class="container">
    <fieldset>

        <legend>
            Registrati Come Venditore
        </legend>

        <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
            <div class="billing-fields">
                <form method="POST" action="{{ route('submitAddVendorAddress')}}">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="tuaIva" class="required">La tua partita IVA<span>*</span></label>

                                <input id="partitaIva" type="text" class="form-control @error('partitaIva') is-invalid @enderror" name="partitaIva" >

                                @error('partitaIva')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="tuaIva" class="required">Il nome della tua Attività<span>*</span></label>

                                <input id="attivita" type="text" class="form-control @error('attivita') is-invalid @enderror" name="attivita" >
                                @error('attivita')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-lg-10">
                            <div class="single-input-item">
                                <label for="via" class="required">Via</label>
                                <input type="text" id="via" class="form-control @error('via') is-invalid @enderror" name="via"   >

                                @error('via')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single-input-item">
                                <label for="civico" class="required">civico</label>
                                <input type="text" id="civico" class="form-control @error('civico') is-invalid @enderror" name="civico"   >

                                @error('civico')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="single-input-item">
                                <label for="città" class="required">città</label>
                                <input type="text" id="città" class="form-control @error('città') is-invalid @enderror" name="città"   >

                                @error('città')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <label for="post_code" class="required">codice postale</label>
                                <input type="text" id="post_code" class="form-control @error('post_code') is-invalid @enderror" name="post_code"  >

                                @error('post_code')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-2"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-input-item">
                                <label for="other_info" class="required">altre informazioni utili</label>
                                <input type="text" id="other_info" class="form-control @error('other_info') is-invalid @enderror" name="other_info"   >

                                @error('other_info')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                            <div class="mt-3"></div>

                            <div class="single-input-item">
                                <button type="submit" class="btn btn-sqr">Diventa venditore!</button>
                            </div>


                </form>
            </div>
        </div>
    </fieldset>
</div>
<div class="mt-5"></div>

