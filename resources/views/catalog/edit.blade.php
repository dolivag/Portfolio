@extends('layout')

@section('title')
    <h1> Edita el libro </h1>
@endsection

@section('content')
    <h3>Modifica la información del libro</h3>

    @if(count($errors)>0)
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/catalog" method="put">
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="bookName">Nombre</label>
            <input type="text" class="form-control" id="bookName" name="bookName" value="El Perfume">
          </div>

          <div class="form-group col-md-6">
            <label for="bookAuthor">Autor</label>
            <input type="text" class="form-control" id="bookAuthor" name="bookAuthor"  value="Patrick Süskind">
          </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="bookYear">Año</label>
                <input type="text" class="form-control" id="bookYear" name="bookYear" value="1985">
            </div>

            <div class="form-group col-md-6">
                <label for="bookISBN">ISDN</label>
                <input type="text" class="form-control" id="bookISBN" name="bookISBN" value="122556687321468563654">
            </div>

        </div>

        <div class="form-group col-md-12">
          <label for="bookGenre">Género</label>
          <input type="text" class="form-control" id="bookGenre" name="bookGenre" value="Terror">
        </div>

        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="bookEdited">Editora</label>
            <input type="text" class="form-control" id="bookEdited" name="bookEdited" value="Seix Barral">
          </div>

          <div class="form-group col-md-4">
            <label for="bookCover">Tipo de tapa</label>
            <select id="bookCover" class="form-control" name="bookCover">
              <option >Tapa dura</option>
              <option selected>Tapa blanda</option>
            </select>
          </div>

          <div class="form-group col-md-2">
            <label for="bookPages">Páginas</label>
            <input type="text" class="form-control" id="bookPages" name="bookPages" value="256">
          </div>

        </div>
        
        <button type="submit" class="btn btn-primary">Modificar</button>

    </form>
@endsection