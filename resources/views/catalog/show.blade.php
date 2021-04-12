
@extends('layout')

@section('title')
    <h1> Vista de los libros</h1>
@endsection

@section('content')
<div class="container">
	<div class="row">       
        <div class="col-md-12">
        <h4>Información de los libros</h4>
        <div class="table-responsive">               
            <table id="mytable" class="table table-bordred table-striped">
                   
                <thead>                                   
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>ISBN</th>
                    <th>Género</th>
                    <th>Editora</th>                     
                    <th>Tapa</th>
                    <th>Páginas</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </thead>

                <tbody>       
                    <tr>
                        <td>La verdad sobre el caso Harry Quebert</td>
                        <td>Joël Dicker</td>
                        <td>2012</td>
                        <td>9788420414065</td>
                        <td>Thriller</td>
                        <td>Alfaguara</td>
                        <td>Blanda</td>
                        <td>660 páginas</td>
                        <td><a class="btn btn-primary btn-sm" role="button" href="/catalog/edit/3" ><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                        
                        <td><a class="btn btn-danger btn-sm" role="button" href="/catalog/delete/3" ><span class="glyphicon glyphicon-trash"></span></button></a></td>
                    </tr>
     
                </tbody>
        
</table>

@endsection