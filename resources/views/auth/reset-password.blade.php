@extends('layouts.dashboard')

@section('page')

    @php $currentPage = 'password-reset' @endphp

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
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                
                                <!-- Email Address -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <x-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <x-input id="password" class="form-control block mt-1 w-full" type="password" name="password" required />
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <label for="password_confirmation">Confirma la contraseña</label>

                                    <x-input id="password_confirmation" class="form-control block mt-1 w-full"
                                                        type="password"
                                                        name="password_confirmation" required />
                                </div>
                                
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20 mt-3" type="submit">Reestablecer contraseña</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    @endsection
