@extends('layouts.dashboard')

@section('page')

    @php $currentPage = '404' @endphp

@endsection

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card card-404">
            <div class="card-body d-flex flex-column">
                <h2 class="card-title mb-3 text-center">¡Oops! La página que buscas no existe</h2>
                <h1 class="card-title mb-3 text-center">404</h1>
                <a class="btn btn-success mt-2 btn-block mt-auto" href="/">Ir a la HOME</a>
            </div>
        </div>
    </div>
</div>

@endsection