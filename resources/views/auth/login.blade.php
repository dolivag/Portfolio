@extends('layout')

@section('title')
    <h3>Inicia sesión
@endsection

@section('content')
    
<div class="card">
    <div class="card-body">
  
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form class="mt-4 mb-4" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3 col-4 mx-auto">
                    <label class="form-label mb-0 text-lg" for="email">Email</label>
                    <x-input id="email" class="form-control block mt-1 sm:w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mb-3 col-4 mx-auto">
                    <label class="form-label mb-0 text-lg font-thin" for="password">Contraseña</label>
                    <x-input id="password" class="form-control block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mb-3 col-4 mx-auto">
                    <label for="remember_me" class="inline-flex items-center text-sm">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-lg text-gray-600">Recuérdame</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mb-4 mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif    
                </div>
                <button class="btn btn-success btn-block mt-4" type="submit">Log in</button>
            </form>
        </div>
    </div>
 
@endsection