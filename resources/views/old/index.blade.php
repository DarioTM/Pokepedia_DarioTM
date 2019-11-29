<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Laravel</title>
        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet"><!--problema-->
        <link href="{{url('assets/css/jumbotron.css')}}" rel="stylesheet"><!--problema-->
        <link href="{{url('assets/css/own.css')}}" rel="stylesheet"><!--problema-->
        <link href="{{url('assets/css/myStyle.css')}}" rel="stylesheet">
    </head>
    <body>
        
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand logo-poke" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        
        
        <div class="d-flex flex-row botoneslogin ">
            <a class="a-login" href="{{ route('login') }}">Sign in</a>
            <a class="a-login" href="{{ route('register') }}">Sign up</a>
             @if(Auth::check())
                 <form method="POST" action="{{ route('logout') }}" >
                  @csrf
                   <button type="submit" class="btn btn-info">Logout</button>
                 </form>
             @else
             
             @endif
            
        </div>  
        
        
        <main role="main">
            <div class="cont-poke">
                <div class="container">
                    <h1 class="display-3">Pokepedia</h1>
                    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                    

                </div>
            </div>
            <div class="container">                
                <!-- contenido a rellenar -->
                @yield('content')
            </div>
        </main>
        <footer class="container">
            <p>&copy; Company 2017-2019</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="{{url('assets/js/jquery-3.3.1.slim.min.js')}}"><\/script>')</script>
        <!-- problema -->
        <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script><!-- problema -->
        <script type="text/javascript" src="{{url('assets/js/main.js')}}"></script>
    </body>
</html>