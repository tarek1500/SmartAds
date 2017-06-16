<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'SmartAds') }}</title>

  <!-- Styles -->
  <link href="{{ mix('css/core.css') }}" rel="stylesheet">
  <link href="{{ mix('css/admin/cpanel.css') }}" rel="stylesheet"> @yield('styles')
</head>

<body>
  <div id="sidebar-menu" class="pull-left">
    <div class="logo text-center">
      <a href="{{ url('/') }}">
            {{ config('app.name', 'SmartAds') }}
        </a><br>
      <span>Admin Panel</span>
    </div>
    <div class="list-group">
      <a href="{{route('admin.cpanel.index')}}" class="list-group-item dashboard"><i class="fa fa-tachometer fa-fw" aria-hidden="true"></i>Dashboard</a>
      <a href="{{route('admin.cpanel.ads')}}" class="list-group-item ads"><i class="fa fa-file-video-o fa-fw" aria-hidden="true"></i>Advertisements</a>
      <a href="{{route('admin.cpanel.playlists')}}" class="list-group-item playlists"><i class="fa fa-list-ol fa-fw" aria-hidden="true"></i>Playlists</a>
      <a href="{{route('admin.cpanel.screens')}}" class="list-group-item screens"><i class="fa fa-desktop fa-fw" aria-hidden="true"></i>Screens</a>
      <a href="{{route('admin.cpanel.notifications')}}" class="list-group-item notifications"><i class="fa fa-bell-o fa-fw" aria-hidden="true"></i>Notifications </i><span class="badge notifications">4</span></a>
      <a href="{{route('admin.cpanel.logs')}}" class="list-group-item logs"><i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>Activity Logs</a>
    </div>
  </div>
  <div id="page-content" class="pull-right">
    <nav id="top-navbar" class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <ul class="nav navbar-nav">
            &nbsp;
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="notifications dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              <i class="fa fa-bell-o fa-fw" aria-hidden="true"></i><span class="badge">4</span>
                          </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  ...
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
  </div>
  <script src="{{ mix('js/core.js') }}"></script>
  @yield('scripts')
</body>

</html>
