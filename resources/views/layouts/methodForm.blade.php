<div class="mt-5"></div>
<div class="container">
    @php
    $user = \Illuminate\Support\Facades\Auth::user();
    @endphp
<form method="POST" action="{{ route('submitAddMethod')}}">
    @csrf
    <fieldset>

        <legend>Aggiungi metodo di pagamento</legend>

        <div class="row">
            <div class="col-lg-6">
                <div class="single-input-item">
                    <label for="payment_type" class="required">Tipologia di pagamento</label>
                    <br/>
                    <select name="payment_type" id="payment_type" class="form-control @error('payment_type') is-invalid @enderror">
                        <option value="visa"> VISA </option>
                        <option value="mastercard"> MASTERCARD </option>
                    </select>
                    @error('payment_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-input-item">
                    <label for="intestatario" class="required">Intestatario</label>
                    <input type="text" id="intestatario" class="form-control @error('intestatario') is-invalid @enderror" name="intestatario"  placeholder="nome e cognome" >

                    @error('intestatario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mt-2"></div>
        <div class="row">

            <div class="col-lg-6">
                <div class="single-input-item">
                    <label for="cardNumber" class="required">Numero carta</label>
                    <input type="text" id="cardNumber" class="form-control @error('cardNumber') is-invalid @enderror" name="cardNumber"  placeholder="Es.: 1234123412341234" >

                    @error('cardNumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="single-input-item">
                    <label for="data_scadenza" class="required">data scadenza</label>
                    <input type="text" id="data_scadenza" class="form-control @error('data_scadenza') is-invalid @enderror" name="data_scadenza"  placeholder="mese anno" >

                    @error('data_scadenza')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-2">
                <div class="single-input-item">
                    <label for="CVV" class="required">CVV</label>
                    <input type="text" id="CVV" class="form-control @error('CVV') is-invalid @enderror" name="CVV"  placeholder="123" >

                    @error('CVV')
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