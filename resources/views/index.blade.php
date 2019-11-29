<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('pokepedia/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="{{url('pokepedia/css/style-login.css')}}">
    <link rel="stylesheet" href="{{url('pokepedia/css/style-show.css')}}">
    <link rel="stylesheet" href="{{url('pokepedia/css/style-create.css')}}">
    <link rel="stylesheet" href="{{url('pokepedia/css/style-post.css')}}">
    <link rel="stylesheet" href="{{url('pokepedia/css/style-showpost.css')}}">
    <link rel="stylesheet" href="{{url('pokepedia/css/style-user.css')}}">

    
</head>
<body>
    
<!-- MENU -->



<section class="container-nav">
    <nav>
        <div class="nav-item">

            <div>
    
                @if(Auth::check())
                    <form method="POST" action="{{ route('logout') }}" >
                    @csrf
                        <a href="{{ route('pokemon.index') }}"><button type="submit" class="btn-desactivar">Logout</button></a>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                        
                @endif
     
            </div>
            
        </div>
        
        @if(Auth::check())
        <div class="nav-item">
            <div><a href="{{url('user/'.Auth::user()->id)}}">{{Auth::user()->name}}</a></div>
        </div>
        @else
        <div class="nav-item">
            <div><a href="{{ route('register') }}">Unirse</a></div>
        
        </div>
        @endif
        <div class="nav-item">

            <div><a href="{{ route('pokemon.index') }}">Pokepedia</a></div>
        </div>

        <div class="nav-item">

            <div><a href="{{ route('post.index') }}">Posts</a></div>
        </div>

        <!--<div class="nav-item">-->
 
        <!--    <div><a href="">Foro</a></div>-->
        <!--</div>-->

    </nav>
</section>

<!-- FIN MENU -->


<!-- FONDO ANIMADO -->

<div class="area" >
    <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
    </ul>

</div >

<!-- FIN FONDO ANIMADO -->

<!-- LOGO -->

<section class="container-logo"> 
<div>
    <div></div>
</div>
</section>

<!-- FIN LOGO -->


<!-- CONTENIDO -->
       
                <!-- contenido a rellenar -->
                



<section class="container-all">
    <div class="contAll">
@yield('content')



    </div>
</section>
  <script type="text/javascript" src="{{url('pokepedia/js/script.js')}}"></script>
<script type="text/javascript" src="{{url('pokepedia/js/main.js')}}"></script>
</body>
</html>

