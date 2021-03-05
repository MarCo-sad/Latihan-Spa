<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin dashboard</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('fontawesome-free-5.15.1-web/css/all.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">   -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
         
  </head>
  <body>
    <div id="app">
      <div class="wrapper">
      <div class="side-menu">
        <div class="logo">
         <h1 class="ch1"> Teluk Coding</h1>
          <p class="cp">Admin Panel | Dashboard</p>     
        </div>

        <!-- Sidebar Menu -->
        <Menuadmin :user-id="@json(auth()->user()->id)"></Menuadmin>
           
    </div>
  <div class="main-content">
    <div class="topmenu">
      <a href="#" id="showmenu"><i class="fa fa-bars" aria-hidden="true"></i></a>
        <div class="search"><i class="fa fa-search" aria-hidden="true"></i> <input type='text' class='src' placeholder='Search...'/></div>
        <div class="uactions">
        <div class="admin-username"><p>Welcome, {{ Auth::user()->name }}</p> </div>
        <div class="admin-logout">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
          </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
        </form>
        </div>
      </div>                             
    </div>
      <div class="main-section"> 

      <router-view></router-view>
      

      </div>
     </div>
    </div>
  </div>
   
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script> 
  
  </body>
</html> 