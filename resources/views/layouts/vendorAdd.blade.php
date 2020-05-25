<div class="container">
        <fieldset>

            <legend>
                Registrati Come Venditore
            </legend>
                <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
                    <div class="billing-fields">
                        <form method="POST" action="{{ url('/vendor') }}">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <label for="tuaIva" class="required">La tua partita IVA<span>*</span></label>

                                        <input id="partitaIva" type="text" class="form-control @error('partitaIva') is-invalid @enderror" name="partitaIva" placeholder="Partita IVA">

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
                                            <label for="name">Sede Attività<span>*</span></label>

                                            <input id="sede" type="text" class="form-control @error('sede') is-invalid @enderror" name="sede" placeholder="Sede Attività">

                                            @error('sede')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            <div class="mt-4"></div>

                            <div class=" row mb-0">

                                <div class="col-md-6 offset-md-0">
                                    <button type="submit" class="btn btn-primary">
                                        {{('Completa Registrazione') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

        </fieldset>
 </div>

