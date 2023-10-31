

@php
    $title = 'Login Page';
    $description = 'Inicio de sesión'
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

@section('content_left')
    <div class="min-h-100 d-flex align-items-end">
        <div class="w-100 w-lg-100 w-xxl-50">
            <div>
                <div class="mb-5">
                <a class="display-3 link-light link-underline link-underline-opacity-0 text-decoration-none" href="https://softandnet.com" target="_blank">Softandnet.</a>
                    <!-- <h1 class="display-3 text-body">Softandnet</h1> -->
                    <p class="link-light mb-0">© 2023 <a class="link-light link-underline link-underline-opacity-0 text-decoration-none" href="https://softandnet.com" target="_blank">Softandnet.</a> All right reserved.</p>

                </div>
                <!-- <p class="h6 text-white lh-1-5 mb-5">
                   El Mejor sitio de la web para gesitinar la venta , alquiler de tu propiedad
                </p>
                <div class="mb-5">
                    <a class="btn btn-lg btn-outline-white" href="/">Inicio</a>
                </div> -->
            </div>
        </div>
    </div>
@endsection

@section('content_right')
    <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
        <div class="sw-lg-50 px-">
            <div class="sh-11">
                <a href="/">
                <img src="{{ asset('image/' . $setting->logo_empresa) }}" alt="{{$setting->name}}" class="" width="80px" height="auto" />
                </a>
            </div>
            <div class="mb-5">
                <h2 class="cta-1 mb-0 text-primary">Bienvenido a,</h2>
                <h2 class="cta-1 text-primary">{{$setting->name}}</h2>
            </div>
            <div class="mb-5">
                <p class="h6">Utilice sus datos para iniciar sesión.</p>
               
            </div>
            <div>
                <form method="POST" action="{{ route('login') }}"  class="tooltip-end-bottom" >
                    @csrf
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="email"></i>
                        <input  placeholder="Email"  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="lock-off"></i>
                        <input  placeholder="Password" /        id="password" type="password" class="form-control pe-7 @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                        @if (Route::has('password.request'))

                        <a class="text-small position-absolute t-3 e-3" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                @endif

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Inicio de sesión</button>
                </form>
            </div>
        </div>
    </div>
@endsection

