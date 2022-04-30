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
            <a href='{{ url("/") }}'>
                <i class="fa-solid fa-square-poll-vertical fa-6x text-secondary"></i>
            </a>
        </div>
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>


    <!-- Footer -->
    <footer class="bg-primary text-secondary fixed-bottom text-center" style="height:45px;">
        <h4>2020</h4>
    </footer>
</body>
</html>