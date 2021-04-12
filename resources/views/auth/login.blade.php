
@extends('layout')

@section('title')
    <h1>Inicia sesión</h1>
@endsection

@section('content')

    @if(count($errors)>0)
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" action="/login" method="post">
                        <div class="row">    
                            <div class="col-xs-12 col-sm-12 col-md-12">                    
                                <div class="form-group">
                                    <label for="username" class="text-info">Nombre de usuario:</label><br>
                                    <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}">
                                </div>
                            </div>
                        </div>    
                            
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12"> 
                                <div class="form-group">
                                    <label for="password" class="text-info">Contraseña:</label><br>
                                    <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="form-group">
                                <div id="recover-pass" class="pb-5">
                                    <a href="/recover" class="text-info">Recuperar contraseña</a>
                                </div>
                                
                            </div>
                            
                        </div>
                        <input type="submit" name="submit" class="btn btn-info btn-block" value="Enviar">
                        <div id="register-link" class="text-right">
                            <a href="/signup" class="text-info">Darme de alta</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection