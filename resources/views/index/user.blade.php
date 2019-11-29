@extends('index')

@section('content')


<div class="tablaUser">
    <div class="contUser">
        
        <div class="contUser1">
            
            <div><h1>Usuario: {{$user->name}}</h1></div>
            
        </div>
        
        <div class="contUser2">
             <div><h1>ID: {{$user->id}}</h1></div>
            <div><h1>Email: {{$user->email}}</h1></div>
           
        </div>
        
        <div class="contUser3"><h1>Post de {{$user->name}}</h1></div>
        <div class="contUser4"><h1><i class="fas fa-arrow-alt-circle-down"></i></h1></div>

    </div>



</div>


<div class="ultimosPost">

 @foreach($posts as $post)

 

  @if($user->id ==  $post->iduser )

 
     <div class="contPost">
                  @if(Auth::check() && $post->iduser == Auth::user()->id || Auth::check() && Auth::user()->name === 'Admin' )
            <div class="postEdit">
                <div>
                    <form action="{{url('post/'.$post->id)}}" method="post" class="destroy">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
           
                <div><a href="{{url('post/'.$post->id.'/edit')}}"><i class="far fa-edit"></i></a></div>
            </div>
             @endif 
         
         <div class="contPost1">
             <div><a href="" class="" ><h1>{{$post->subject}}</h1></a></div>
             <div><h1>Nº {{$post->id}}</h1></div>
        </div>
        
         <div class="contPost2">
             
             
             <div>
                 @foreach($pokemons as $pokemon)
                 @if($post->idpokemon == $pokemon->id)
                 <h5>Pokémon relacionado, <a href="{{url('pokemon/'.$pokemon->id)}}" >{{$pokemon->name}}</a></h5>
                 @endif
                  @endforeach
            </div>
             
             
             
             <div>
 
                 <h5>Creado por, <a href="{{url('user/'.$user->id)}}" >{{$user->name}}</a></h5>

            </div>
             
             
         </div>
         
         <div class="contPost3">
             <p>{{$post->content}}</p>
        </div>
         
        <div class="contPost4">
            <a href="{{url('post/'.$post->id)}}" class="" >Ver Post</a>
                        
            <div>          
                 @php($count=0)
                 @foreach($comments as $comment)
                 @if($post->id == $comment->idpost)
                 @php($count++)
                 @endif
                 @endforeach
                 <h5>Comentarios: {{$count}}</h5>
            </div>           
            
        </div>
        
 

        
    </div>

@endif


 @endforeach



<div class="contPokemon2">
    <div>
  
    </div>    
@if(Auth::check())    
    <div class="pokemonadd">
    <a href="{{url('post/create')}}" class="btn btn-success" >Crear Post</a>
    </div>
@endif
</div>


@stop