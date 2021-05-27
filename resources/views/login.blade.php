<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>White Collars</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */ 
        .container {
            margin-top: 5rem;
        }
        .navbar {
          margin-bottom: 0;
          border-radius: 0;
        }
        
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}
        
        /* Set gray background color and 100% height */
        .sidenav {
          padding-top: 20px;
          background-color: #f1f1f1;
          height: 100%;
        }
        
        /* Set black background color, white text and some padding */
        footer {
          background-color: #555;
          color: white;
          padding: 15px;
          position: relative;
          bottom: 0;
          width: 100%;
          height: 90px;
        }
        
        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
          .sidenav {
            height: auto;
            padding: 15px;
          }
          .row.content {height:auto;} 
        }
      </style>
</head>
<body>
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
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div>
                                <div class="col-xs-12 col-sm-12 col-md-12">                    
                                    <div class="form-group">
                                        <label for="email" class="text-info">Email:</label><br>
                                        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
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
                                        <a disabled href="#" class="text-info">Recuperar contraseña</a>
                                    </div>                                 
                                </div>                               
                            </div>
                            <input type="submit" name="submit" class="btn btn-info btn-block" value="Enviar">
                            <div id="register-link" class="text-right">
                                <a href="/register" class="text-info">Darme de alta</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
   