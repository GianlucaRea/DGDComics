@extends('layouts.app')

@section('content')
    <div class="user-login-area mb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-title text-center mb-30">
                        <h2>Registrati</h2>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
                    <div class="billing-fields">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-register">
                                        <label for="name">Nome<span>*</span></label>

                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-register">
                                        <label for="name">Cognome<span>*</span></label>

                                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                        @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-register">
                                        <label for="name">Username<span>*</span></label>

                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('name') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-register">
                                        <label for="name">Età<span>*</span></label>

                                        <input id="age" type="number" min="0" max="100" class="form-control  @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                                        @error('age')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-register">
                                        <label for="email"><span>{{ __('Indirizzo E-Mail') }}</span></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-register">
                                        <label for="name">Telefono<span></span></label>
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" maxlength="10" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="single-register">
                                        <label for="password"><span>{{ __('Password') }}</span></label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        @foreach($messages->all() as $message)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @endforeach
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-register">
                                        <label for="password-confirm"><span>{{ __('Conferma Password') }}</span></label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div></div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary">

                                        {{__('Registrati') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
