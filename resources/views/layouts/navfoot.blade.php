<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.1.95/css/materialdesignicons.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
          #navigationBar {
            background-color: rgba(0, 0, 0, 0.0);
          }
          .navbar-nav {
            margin-left: 50px;
          }
          .nav-item .btn {
            color: #004b4d;
            font-size: 25px;
          }
          body {
            height: 100%;
            min-height: 100%;
          }

          footer {
            position: relative;
            left: 0;
            bottom: 0;
            background-color: #181818;
            color: white;
            text-align: center;
          }
          .footer-bottom {
            height: 50px;
            background-color: #181818;
          }
        </style>

    </head>
    <body class="antialiased">
      <header>
        <nav id="navigationBar" class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#" style="padding: 0 0 0 20px;">
              <img src="{{asset('/images/TempLogo.png')}}" alt="" width="85" height="50" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <button class="btn">Home</button>
                </li>
                <li class="nav-item">
                  <button class="btn">Schedules</button>
                </li>
                <li class="nav-item">
                  <button class="btn">Map</button>
                </li>
                <li class="nav-item">
                  <button class="btn">FAQ</button>
                </li>
              </ul>
              <form class="d-flex">
                <button class="btn btn-outline-success btn-lg" style="width: 150px;"type="submit">Login</button>
              </form>
            </div>
          </div>
        </nav>
      </header>

      @yield('navfoot')

      <footer>
        <div class="text-center p-5" style="background-color: #313a43;">
          <p class="text-white">Website by Bird-Bird</p>
        </div>
        <div class="footer-bottom" style=""></div>
      </footer>
    </body>
</html>
