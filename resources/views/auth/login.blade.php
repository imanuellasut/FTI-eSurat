@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row content rounded">
        <div class="col-md-6 mb-3">
            <div class="text-center">
                <img class="mb-4 mt-3" src="img/logo/logo-fti.png" alt="" width="120px" height="80">
                <img class="mb-4 mt-3" src="img/logo/logo-ukdw.png" alt="" width="70px" height="80">
                <h2 class="h1 font-weight-bold mb-0">WELCOME</h2>
                <h2 class="h5 font-weight-bold mb-0">Sistem Informasi Surat Menyurat</h2>
                <h2 class="h5 font-weight-bold mb-0">Universitas Kristen Duta Wacana</h2>
                <h2 class="h5 font-weight-bold mb-0">Fakultas Teknologi Informasi</h2>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <h3 class="signin-text mb-3"> Sign In</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('E-Mail') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
                <a href="{{ route('register') }}" class="btn btn-info">Register </a>
            </form>
        </div>
    </div>
</div>
@endsection
