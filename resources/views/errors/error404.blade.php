@extends('layout')

@section('title')
    <div class="justify-content-center"></div><h1> Error 404</h1></div>
@endsection

@section('content')

<!------ Include the above in your HEAD tag ---------->

<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="mb-4 lead"><h1>Oops!</h1></div>
                <div class="mb-4 lead">No pudimos encontrar la página que buscas :(</div>
                <a href="/catalog" class="btn btn-link">Llévame a casa <span class="glyphicon glyphicon-home"></span></a>
            </div>
        </div>
    </div>
</div>

@endsection