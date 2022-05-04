<!doctype html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ca887fadee.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
       
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <title>@yield('title', env('APP_NAME'))</title>

  </head>
<body style="background-color:#F2F0EB;">

    <!-- Header -->
    <nav class="bg-primary" style="height:100px;">
        <div style="margin-left:5%;">
            <a href='{{ url("/") }}' style="float:left">
                <i class="fa-solid fa-square-poll-vertical fa-6x text-secondary"></i>
            </a>
            <div class="float-start" style="margin-top:35px;margin-left:5%;">
            <a href="{{ route('create') }}" class="text-decoration-none text-secondary"><h3>Stwórz ankiete</h3></a>
            </div>
            <div class="float-start text-secondary" style="margin-top:35px;margin-left:5%;">
                <a href="{{ route('enter') }}" class="text-decoration-none text-secondary"><h3>Wpisz kod</h3></a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main style="min-height:700px;">
        @yield('content')
    </main>


    <!-- Footer -->
    <footer class="bg-primary text-secondary text-center" style="height:45px;bottom:0;">
        <h4>2020</h4>
    </footer>
</body>
</html>