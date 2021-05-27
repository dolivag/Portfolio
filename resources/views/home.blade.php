<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>White Collars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  
</head>
<body>
  <script>
    
  </script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between">
    <div class="container-fluid">
      @if (Auth::check())
        <h5 class="navbar-brand" href="#">{{Auth::user()->name}}</h5>
        <p class="navitem" style="color:white;" href="#">Permisos de @if (Auth::user()->hasRole('Administrador')) Administrador @else Usuario @endif</p>
      @endif
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex-end">
          @if (!Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="login">Iniciar sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register">Registrarme</a>
          </li>
          @else 
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
              <input type="hidden" value={{csrf_token()}}>
                <button type="submit" class="btn text-center btn-secondary mx-auto">Cerrar sesión</button>
            </form>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <div id="app">
    

    <main-component></main-component>
    
  </div>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
    $( document ).ready(function() {
      if(!localStorage.getItem('token')){
        let token = "<?php echo isset($token) ? $token : ''; ?>";
        localStorage.token = token;
      }
      //console.log(localStorage.getItem('token'), ':)');
    });
    </script>
  </body>
</html>