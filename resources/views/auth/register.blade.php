@extends('layouts.dashboard')

@section('page')

    @php $currentPage = 'register' @endphp

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
                                <img src="{!! asset('theme/images/hotel-laravel.jpg') !!}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nombre de usuario</label>
                                    <x-input id="name" class="form-control block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <x-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <x-input id="password" class="form-control block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirma la contraseña</label>
                                    <x-input id="password_confirmation" class="form-control block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label for="role">Rol</label>
                                    <select class="form-select form-control block mt-1 w-full"  id="role" name="role" required>
                                        <option value="administrador">Administrador</option>
                                        <option value="usuario">Usuario</option>
                                    </select>
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Regístrarme</button>
    
                            </form>
                            <div class="register-link">
                                <p>
                                    ¿Ya tienes una cuenta?
                                    <a href="{{ route('login')}}">Log in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
