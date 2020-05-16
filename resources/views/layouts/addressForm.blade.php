<div class="mt-5"></div>
<div class="container">
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
    @endphp
    <form method="POST" action="{{ route('submitAddAddress')}}">
        @csrf
        <fieldset>

            <legend>Aggiungi indirizzo di spedizione</legend>

            <div class="row">
                <div class="col-lg-10">
                    <div class="single-input-item">
                        <label for="via" class="required">Via</label>
                        <input type="text" id="via" class="form-control @error('via') is-invalid @enderror" name="via"  placeholder="Es.: via delle papere e dei procioni" >

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
                        <input type="text" id="civico" class="form-control @error('civico') is-invalid @enderror" name="civico"  placeholder="Es.: 3" >

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
                        <input type="text" id="città" class="form-control @error('città') is-invalid @enderror" name="città"  placeholder="Es.: città delle papere e dei procioni" >

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
                        <input type="text" id="post_code" class="form-control @error('post_code') is-invalid @enderror" name="post_code"  placeholder="Es.: 12345" >

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
                        <input type="text" id="other_info" class="form-control @error('other_info') is-invalid @enderror" name="other_info"  placeholder="Es.: 3 piano, Palazzo A, 3 procioni e 5 papere" >

                        @error('other_info')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
            </div>

        </fieldset>
        <div class="mt-3"></div>

        <div class="single-input-item">
            <button type="submit" class="btn btn-sqr">Salva</button>
        </div>

    </form>
</div>
<div class="mt-5"></div>