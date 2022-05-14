<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University -Rest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        .color-container{
            width: 16px;
            height: 16px;
            display: inline-block;
            border-radius: 4px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Universidad</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="{{ request()->is('/estudiantes') ? 'nav-link' : 'nav-link' }}" aria-current="page" href="/estudiantes">Estudiantes</a>
        <a class="nav-link active" href="#">Profesores</a>
        <!-- <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link disabled">Disabled</a> -->
      </div>
      
      <div class="row mb-3">
          <div class="col-md-6 offset-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  {{ __('Recordar') }}
                </label>
              </div>
            </div>
      </div>

      <form class="d-flex" action="/api/estudiantesEPN" method="POST">
        @csrf
        @auth
        <input class="form-control me-2" type="search" placeholder="Buscar estudiante" aria-label="Search" name="busqueda">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
        @endauth        
      </form>
      <form class="d-flex" action="/api/profesoresEPN" method="POST">
        @csrf
        @auth
        <input class="form-control me-2" type="search" placeholder="Buscar profesor" aria-label="Search" name="busqueda">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
        @endauth        
      </form>     
      @auth
        <div class="">
          {{auth()->user()->name}}
        </div>
        
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn ">Logout</a>
        </div>
      @endauth
    </div>    
  </div>
</nav>
        @yield('content')
</body>
</html>