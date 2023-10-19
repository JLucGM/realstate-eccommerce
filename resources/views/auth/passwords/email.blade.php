@php
$title = 'Reset';
$description = 'Login Page'
@endphp
@extends('layout_full',['title'=>$title, 'description'=>$description])
@section('css')
@endsection

@section('js_vendor')
<script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
<script src="/js/pages/auth.login.js"></script>
@endsection

@section('content_right')
<div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
    <!-- <div class="row justify-content-center"> -->
    <!-- <div class="col-md-8"> -->
    {{--<div class="card">
                <div class="card-header">{{ __('Reset Password') }}
</div>

<div class="card-body">--}}
    <div class="sw-lg-50 px-">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="mb-5">
            <h2 class="cta-1 mb-0 text-primary">Bienvenido,</h2>
            <h2 class="cta-1 text-primary">Empecemos!</h2>
        </div>
        <div class="mb-5">
            <p class="h6">Utilice sus credenciales para iniciar sesión.</p>

        </div>
        <div>

            <form method="POST" action="{{ route('password.email') }}" class="tooltip-end-bottom">
                @csrf

                <div class="mb-3 filled form-group">
                    {{--<label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}
                    <i data-acorn-icon="email"></i>

                    <!-- <div class="col-md-6"> -->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!-- </div> -->
                </div>

                <!-- <div class="row mb-0">
                            <div class="col-md-6 offset-md-4"> -->
                <button type="submit" class="btn btn-lg btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
                <!-- </div>
                        </div> -->
            </form>
        </div>
    </div>
    {{--</div>
            </div>--}}
    <!-- </div> -->
    <!-- </div> -->
</div>
@endsection