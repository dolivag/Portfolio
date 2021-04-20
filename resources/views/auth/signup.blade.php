
@extends('layout')

@section('title')
    <h1>Crea tu cuenta</h1>
@endsection

@section('content')

<div class="container">
    <div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <h3 class="panel-title">Crea tu cuenta y comienza a leer<small>¡Es gratis!</small></h3>
                     </div>
                     <div class="panel-body">
                    <form role="form">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Apellidos">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Correo electrónico">
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirma tu contraseña">
                                </div>
                            </div>
                        </div>
                        
                        <input type="submit" value="Registro" class="btn btn-info btn-block">
                        <br>
                        <p class="text-center">¿Ya tienes una cuenta? <a href="/login">Accede</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection