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
                    <input type="text" id="intestatario" class="form-control @error('intestatario') is-invalid @enderror" name="intestatario"  >

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

            <div class="col-lg-8">
                <div class="single-input-item">
                    <label for="cardNumber" class="required">Numero carta</label>
                    <input type="text" id="cardNumber" class="form-control @error('cardNumber') is-invalid @enderror" name="cardNumber"  >

                    @error('cardNumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="row">
                <div class="single-input-item" style="width: 85px">
                    <label for="data_scadenza" class="required">mese</label>
                    <input type="number" id="month" class="form-control @error('month') is-invalid @enderror" name="month"  >

                    @error('month')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                    <div class="ml-3"></div>
                <div class="single-input-item" style="width: 115px">
                    <label for="data_scadenza" class="required">anno</label>
                    <input type="year" id="year" class="form-control @error('year') is-invalid @enderror" name="year" >

                    @error('year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                    <div class="ml-3"></div>
                    <div class="single-input-item" style="width: 85px">
                        <label for="CVV" class="required">CVV</label>
                        <input type="text" id="CVV" class="form-control @error('CVV') is-invalid @enderror" name="CVV"  >

                        @error('CVV')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </fieldset>
    <div class="mt-3"></div>

    <div class="row">
        <div class="col-lg-9-5"></div>
        <div style="margin-right: 2.3%"></div>

        <div class="col-lg-1">
            <div class="buttons-back">
                <a href="{{url('/accountArea/paymentmethods')}}">Indietro</a>
            </div>
        </div>
        <div style="margin-right: 1.3334%"></div>
        <div class="col-lg-1">
            <div class="single-input-item">
                <button type="submit" class="btn btn-sqr">Salva</button>
            </div>
        </div>
    </div>

</form>
</div>
<div class="mt-5"></div>