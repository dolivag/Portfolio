@extends('layout')

@section('title')
    <h1> Crear libro </h1>
@endsection



@section('content')
    <h3>Crea tu libro para el catálogo</h3>

    @if(count($errors)>0)
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/catalog" method="post">
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="bookName">Nombre</label>
            <input type="text" class="form-control" id="bookName" name="bookName" placeholder="Nombre del libro" value="{{old('bookName')}}">
          </div>

          <div class="form-group col-md-6">
            <label for="bookAuthor">Autor</label>
            <input type="text" class="form-control" id="bookAuthor" name="bookAuthor"  placeholder="Autor del libro" value="{{old('bookAuthor')}}">
          </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="bookYear">Año</label>
                <input type="text" class="form-control" id="bookYear" name="bookYear" placeholder="Año de lanzamiento" value="{{old('bookYear')}}">
            </div>

            <div class="form-group col-md-6">
                <label for="bookISBN">ISDN</label>
                <input type="text" class="form-control" id="bookISBN" name="bookISBN" placeholder="Código ISBN del libro" value="{{old('bookISBN')}}">
            </div>

        </div>

        <div class="form-group col-md-12">
          <label for="bookGenre">Género</label>
          <input type="text" class="form-control" id="bookGenre" name="bookGenre" placeholder="Género literario principal" value="{{old('bookGenre')}}">
        </div>

        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="bookEdited">Editora</label>
            <input type="text" class="form-control" id="bookEdited" name="bookEdited" placeholder="Editora del libro" value="{{old('bookEdited')}}">
          </div>

          <div class="form-group col-md-4">
            <label for="bookCover">Tipo de tapa</label>
            <select id="bookCover" class="form-control" name="bookCover">
              <option selected>Tapa dura</option>
              <option>Tapa blanda</option>
            </select>
          </div>

          <div class="form-group col-md-2">
            <label for="bookPages">Páginas</label>
            <input type="text" class="form-control" id="bookPages" name="bookPages" placeHolder="Páginas del libro" value="{{old('bookPages')}}">
          </div>

        </div>
        
        <button type="submit" class="btn btn-primary">Añadir</button>

    </form>
@endsection