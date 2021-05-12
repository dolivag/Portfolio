@extends('layouts.dashboard')

@section('page')

    @php $currentPage = 'login' @endphp

@endsection

@section('content')

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{!! asset('theme/images/hotel-laravel.jpg' ) !!}" alt="Hotel-Laravel">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <x-input id="email" class="form-control block mt-1 sm:w-full" type="email" name="email" :value="old('email')" required autofocus />
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <x-input id="password" class="form-control block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Recuérdame
                                    </label>
                                    <label>
                                        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Entrar</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20" disabled="">Entra con Facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2" disabled="">Entra con Twitter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    ¿No tienes una cuenta?
                                    <a href="#">Regístrate aquí</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection
