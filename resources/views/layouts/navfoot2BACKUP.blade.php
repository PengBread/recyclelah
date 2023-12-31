<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.1.95/css/materialdesignicons.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Styles -->
        <style>
          #navigationBar {
            background-color: rgba(0, 0, 0, 0.0);
          }
          .navbar-nav {
            margin-left: 50px;
          }
          .nav-item {
            padding: 0 10px;
          }
          .nav-link {
            color: #004b4d;
            font-size: 30px;
          }

          .footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
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
        <nav id="navigationBar" class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="/" style="padding: 0 0 0 20px;">
              <img src="{{asset('/images/TempLogo.png')}}" alt="" width="85" height="50" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('schedules') }}">Schedules</a>
                </li>
                @if(!auth()->user() || !auth()->user()->affiliate)
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('mapPage') }}">Map</a>
                </li>
                @else
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Map
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('mapPage') }}">Map</a></li>
                    <li><a class="dropdown-item" href="{{ route('workerPage') }}">Organization Map</a></li>
                  </ul>
                </li>
                @endif
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                </li>
              </ul>

              @guest
              <div class="d-flex">
                <a class="btn btn-outline-success btn-lg" style="width: 150px" href="/login">Login</a>
              </div>
              @endguest

              @auth
              <!-- 
                If user is logged in, the nav bar will change to "Profile/Account"
              -->
              <div class="d-flex nav-item dropdown">
                <a class="btn btn-outline-success btn-lg dropdown-toggle" style="width: 150px" href="/login" data-bs-toggle="dropdown" aria-expanded="false"> 
                  <span class="mdi mdi-account-circle-outline"></span>
                  Account
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('authProfile') }}">Profile</a></li>
                  <li><a class="dropdown-item" href="{{ route('support') }}">Support</a></li>
                  <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                </ul>
              </div>
              @endauth

            </div>
          </div>
        </nav>
      </header>

      @yield('navfoot2')

      <footer>
        <div class="footer">
          <div class="text-center navbar-static-bottom p-5" style="background-color: #313a43;">
            <p class="text-white">Website by Bird-Bird</p>
          </div>
          <div class="footer-bottom" style=""></div>
        </div>
      </footer>
    </body>
</html>
