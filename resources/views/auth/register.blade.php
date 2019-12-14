@extends('main')

@section('title','| Register')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
<div class="card card-shadow" style="height: 350px;">
    <div class="card-header text-center">Aturan Register</div>
    <div class="card-body">
        <ul>
            <li class="pb-3">Register hanya bisa dilakukan oleh mahasiswa Jurusan Teknik Informatika.</li>
            <li class="pb-3">Email harus diisi dengan email yang telah terdaftar pada Student Site Universitas Gunadarma.</li>
            <li class="pb-3">Setelah melakukan register, mahasiswa wajib melakukan verifikasi melalui email pada Student Site Universitas Gunadarma.</li>
            <li class="pb-3">Password minimal 8 karakter.</li>
        </ul>
    </div>
</div>
        </div>
        <div class="col-md-6">
            <div class="card card-shadow" style="height: 350px;">
                <div class="card-header text-center">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <input id="npm" type="text" placeholder="NPM" class="form-control{{ $errors->has('npm') ? ' is-invalid' : '' }}" name="npm" value="{{ old('npm') }}" required autofocus>

                                @if ($errors->has('npm'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('npm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group text-center m-0">
                            <div class="col-md-10 offset-md-1 p-0">
                                <button type="submit" class="btn btn-block btn-primary">
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
@endsection
