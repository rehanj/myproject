@extends('layouts.app')


@section('header')

<section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(img/register.jpg);width:100%;height:950px;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
                <div class="hero-content">
                        <div class="container">
                                <div class="row justify-content-center">

                                    <div class="col-md-10">
                                    <br><br>
                                        <div class="card" style="background-image: url(img/createusernew.png);width:700px;height:750px;opacity: 0.7;filter: alpha(opacity=70)">
                                            <div class="card-header" style="text-align:center;font-size:40px;font-weight:bold"><img src="img/registericon.png" style="width:60px;height:60px;">        {{ __('Register') }}</div>

                                                <div class="card-body" style="font-weight:bold;font-size:18px">
                                                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="nameWithInitials" class="col-md-4 col-form-label text-md-right">{{ __('Name with Initials') }}<span class="req"> *</span></label>

                                                            <div class="col-md-6">
                                                                <input id="nameWithInitials" type="text" class="form-control{{ $errors->has('nameWithInitials') ? ' is-invalid' : '' }}" name="nameWithInitials" value="{{ old('nameWithInitials') }}" required autofocus>

                                                                @if ($errors->has('nameWithInitials'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('nameWithInitials') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Calling Name') }}<span class="req"> *</span></label>

                                                            <div class="col-md-6">
                                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                                @if ($errors->has('name'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="nic" class="col-md-4 col-form-label text-md-right">{{ __('NIC') }}<span class="req"> *</span></label>

                                                            <div class="col-md-6">
                                                                <input id="nic" type="text" class="form-control{{ $errors->has('nic') ? ' is-invalid' : '' }}" name="nic" pattern="\d{9}v" value="{{ old('nic') }}" required autofocus>

                                                                @if ($errors->has('nic'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('nic') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}<span class="req"> *</span></label>

                                                            <div class="col-md-6">
                                                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                                                @if ($errors->has('address'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('address') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">

                                                                <label for="pollingDivision" class="col-md-4 col-form-label text-md-right">{{ __('Polling Division') }}</label>

                                                                    <div class="col-md-6">
                                                                        <input id="pollingDivision" type="text" class="form-control{{ $errors->has('pollingDivision') ? ' is-invalid' : '' }}" name="pollingDivision" value="{{ old('pollingDivision') }}" required autofocus>

                                                                        @if ($errors->has('pollingDivision'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('pollingDivision') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                            </div>


                                                        <div class="form-group row">
                                                            <label for="contactNumber" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}<span class="req"> *</span></label>

                                                            <div class="col-md-6">
                                                                <input id="contactNumber" type="text" class="form-control{{ $errors->has('contactNumber') ? ' is-invalid' : '' }}" name="contactNumber" pattern="\{10}" value="{{ old('contactNumber') }}" required autofocus>

                                                                @if ($errors->has('contactNumber'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('contactNumber') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="req"> *</span></label>

                                                            <div class="col-md-6">
                                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                                @if ($errors->has('email'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<span class="req"> *</span></label>

                                                            <div class="col-md-6">
                                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                                @if ($errors->has('password'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}<span class="req"> *</span></label>

                                                            <div class="col-md-6">
                                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-0">
                                                            <div class="col-md-6 offset-md-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                    {{ __('Register') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('content')

@endsection
