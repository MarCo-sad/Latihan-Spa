<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Homepage</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('fontawesome-free-5.15.1-web/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">     
  </head>
<body>
  <div id="app">
      <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
          <i class="fas fa-bars"></i>
        </a>

        <!-- Menu Homepage-->
        <Menuhomepage></Menuhomepage>
        <main class="page-content">
          <div class="container-fluid">
       
        <!-- Nested Routes -->
        <router-view></router-view>

          </div>
        <section class="footers bg-light pb-3">
         <div class="container pt-5">
             <div class="row">
                 <div class="col-xs-12 col-sm-6 col-md-6 footers-one">
                  <div class="footers-logo">
                  <p>Teluk Coding</p>
                        </div>
                  <div class="footers-info">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                  </div>
                  <div class="social-icons"> 
                      <a href="#"><i id="social-fb" class="fab fa-facebook fa-2x social"></i></a>
                      <a href="#"><i id="social-tw" class="fab fa-twitter fa-2x social"></i></a>
                     <a href="#"><i id="social-em" class="fas fa-envelope fa-2x social"></i></a>
                </div>
              </div>  

               <div class="col-xs-12 col-sm-6 col-md-2 footers-four">
               
                  <ul class="list-unstyled">
                 <li><a href="#">Success item</a></li> 
                 <li><a href="#">Secondary item</a></li> 
                 <li><a href="#">Info item</a></li> 
                 <li><a href="#">Warning item</a></li> 
                 <li><a href="#">Danger item</a></li> 
                 <li><a href="#">Primary item</a></li> 
                </ul>
              </div>
               <div class="col-xs-12 col-sm-6 col-md-2 footers-five">
             
                  <ul class="list-unstyled">  
                  <li><a href="#">Success item</a></li> 
                 <li><a href="#">Secondary item</a></li> 
                 <li><a href="#">Info item</a></li> 
                 <li><a href="#">Warning item</a></li> 
                 <li><a href="#">Danger item</a></li> 
                 <li><a href="#">Primary item</a></li> 
                </ul>
              </div>
              
             </div>
         </div>
      </section>
        </main>
      </div> 
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script> 
  
  </body>
</html>
