@extends('layout')


@section('content')
    @if (Session::get('mensaje'))
        <div><p style="color:red;">{{Session::get('mensaje')}}</p></div>
        {{Session::forget('mensaje')}}
    @endif
	@foreach ($errors->all() as $error)
        <div style="color:red;">{{ $error }}</div>
    @endforeach

<div class="container mx-auto">
    <div class="page-header">
        <h1><i class="fas fa-plus-circle"></i>  Crea un partido</h1>
    </div>
    <p>Selecciona la fecha, los equipos y el resultado</p>
</div>
<div>
    
    
    <form method="post" action="{{route('games.store')}}">
		@csrf
		<div class="form-group input-group-lg">
		   <label for="team1">Equipo Local</label>
		    <select class="form-select " id="team1" name="team1" >
				@foreach($teams as $team)  	
				   	<option value="{{$team->id}}">{{$team->name}}</option>				    
			 	@endforeach
			</select>
		</div>

        <div class="form-group input-group-lg">
            <label for="team2">Equipo Visitante</label>
             <select class="form-select " id="team2" name="team2" >
                 @foreach($teams as $team)  	
                        <option value="{{$team->id}}">{{$team->name}}</option>				    
                  @endforeach
             </select>
         </div>
		
		<div class="form-group">
		    <label for="result1">Resultado local</label>
		    <input type="text" class="form-control" id="result1" name="result1" placeholder="Goles equipo local" value="{{old('result1')}}">
		</div>

		<div class="form-group">
		    <label for="visitor_gol">Resultado visitante</label>
		    <input type="text" class="form-control" id="result2" name="result2" placeholder="Goles equipo visitante" value="{{old('result2')}}">
		</div>

	    <div class="form-group col-3">
	    	<label for="date">Fecha del partido</label>
	        <div class='input-group date' data-date-format="yyyy-mm-dd" id='date'>
	            <span class="input-group-addon">
	                <span class="glyphicon glyphicon-calendar"></span>
	            </span>
                <input type='text' class="form-control" id="date" name="date" placeholder="Formato YYYY-MM-DD" value="{{old('date')}}"/>
	        </div>
	    </div>
	    <button type="submit" class="btn btn-primary">Guardar</button>
	</form>
</div>

        
@endsection