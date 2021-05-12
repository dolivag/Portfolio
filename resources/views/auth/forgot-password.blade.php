

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
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="login-form">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div><p>¿Olvidaste tu contraseña? No te preocupes. Sólo déjanos saber tu dirección de correo electrónico
                                    y te enviaremos un mail para restablecer tu contraseña fácilmente</p>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <x-input id="email" class="form-control block mt-1 sm:w-full" type="email" name="email" :value="old('email')" required autofocus />
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Enviar mail de reestablecimiento</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

