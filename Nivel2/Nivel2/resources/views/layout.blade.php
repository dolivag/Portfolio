<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Nivel 1 - Vista 3</title>
          
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </head>
    
    <body>        
        <div class="card-body">
            <div class="card alert-danger">
             @yield('content')
            </div>
        </div>
    </body>
    <footer> 
        <div class="card-body">
            <div class="card alert-dark">
                IT Academy - 2021
            </div>
        </div>
    </footer>
</html>