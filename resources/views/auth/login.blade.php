{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.auth')

@section('content')
    <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
            <img src="{{ asset('frontendIT/auth/images/img-01.png') }}" alt="IMG">
        </div>

        <form method="POST" class="login100-form validate-form" action="{{ route('login') }}">
            @csrf
            <span class="login100-form-title">
                Member Login
            </span>
            @if ($errors->has('email'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('email') }}
                </div>
            @endif
            @if ($errors->has('password'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('password') }}
                </div>
            @endif

            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <input class="input100  @error('email') is-invalid @enderror" type="text" name="email"
                    placeholder="Email">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="Password is required">
                <input class="input100  @error('password') is-invalid @enderror" type="password" name="password"
                    placeholder="Password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit">
                    Login
                </button>
            </div>

            <div class="text-center p-t-12">
                <span class="txt1">
                    Forgot
                </span>
                <a class="txt2" href="{{ route('password.request') }}">
                    Email / Password?
                </a>
            </div>

            <div class="text-center p-t-136">
                <a class="txt2" href="{{ route('register') }}">
                    Create your Account
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
            </div>
        </form>
    </div>
@endsection
