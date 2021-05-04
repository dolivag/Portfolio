@extends('layout')

@section('title')
<h2>Regístrate</h2>
@endsection

@section('content')

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="mt-4 mb-4" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3 col-4 mx-auto">
                <label class="form-label mb-0 text-lg" for="name">Nombre de usuario</label>
                <x-input id="name" class="form-control block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mb-3 col-4 mx-auto">
                <label class="form-label mb-0 text-lg" for="email" >Email</label>
                <x-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mb-3 col-4 mx-auto">
                <label class="form-label mb-0 text-lg font-thin"  for="password">Contraseña</label>
                <x-input id="password" class="form-control block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3 mx-auto">
                <label class="form-label mb-0 text-lg text-thin" for="password_confirmation">Confirma la contraseña</label>
                <x-input id="password_confirmation" class="form-control block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required/>
            </div>

            <!-- Role -->
            <div class="mb-3 col-4 mx-auto">
                <label class="form-label mb-0 text-lg text-thin" for="role">Rol</label>
                <select class="form-select form-control block mt-1 w-full"  id="role" name="role" required>
                    <option value="Administrador">Administrador</option>
                    <option value="Usuario">Usuario</option>
                </select>
            </div>

            <div class="mb-3 col-4 mx-auto">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>
            </div>
            <div class="mb-3 col-4 mx-auto">
                <button class="btn btn-success btn-block mt-4" type="submit">Registrarme</button>
            </div>
        </form>

        


@endsection