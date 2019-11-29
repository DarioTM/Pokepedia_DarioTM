@extends('index')

@section('content')



 
     <div class="contPostshow">
         
         <div class="contPost1show">
             <div><a href="" class="" ><h1>{{$post->subject}}</h1></a></div>
             <div><h1>Nº {{$post->id}}</h1></div>
        </div>
        
         <div class="contPost2show">
             
             
             <div>
                 @foreach($pokemons as $pokemon)
                 @if($post->idpokemon == $pokemon->id)
                 <h5>Pokémon relacionado, <a href="{{url('pokemon/'.$pokemon->id)}}" >{{$pokemon->name}}</a></h5>
                 @endif
                  @endforeach
            </div>
             
             
             
             <div>
                 @foreach($users as $user)
                 @if($post->iduser == $user->id)
                 <h5>Creado por, <a href="{{url('user/'.$user->id)}}" >{{$user->name}}</a></h5>
                 @endif
                 @endforeach
            </div>
             
             
         </div>
         
         <div class="contPost3show">
             <p>{{$post->content}}</p>
        </div>
        
         <hr class="hr1">
        
       <div class="comentarios">
        
       <div class="cont-coment"><h5>Comentarios</h5></div>
       
       @if(Auth::check())
        
        <form method="POST" action="{{action('CommentsController@store')}}"  class="" accept-charset="UTF-8">
            @csrf
            <input type="text" name="idpost" value="{{$post->id}}" class="inputDes"/>
            @foreach($users as $user)
            @if($post->iduser == $user->id)
            <input type="text" name="iduser" value="{{$idsession}}" class="inputDes"/>
            @endif
            @endforeach
   
            <textarea name="content" placeholder="Escribe tu mensjae aquí..."class="textareaComent"></textarea>
          <input type="submit" value="Enviar" class="btn-enviar">
         
        
        </form>  
        @endif
        
        
        <div class="showComentarios">
         @php($count=0)
         @foreach($comments->sortByDesc('created_at') as $comment)
         @foreach($users as $user)
           @if($comment->idpost ==  $post->id )
           
            @if($comment->iduser == $user->id)
            <div class="showSingle">
            @php($count++)
            <div><h5><a href="" class="">{{$user->name}} </a> dice:</h5> </div>
            <hr class="hr2">
            
            {{$comment->content}}
            
            <div class="fechaComment">
             <p>{{substr($comment->created_at->toTimeString(), 0, 5 )}} </p>
             <p>{{$comment->created_at->toDateString()}}</p>
             </div>
            
           <!--$rest = substr("abcdef", -3, 1);-->
           
            @if(Auth::check() && $comment->iduser == Auth::user()->id || Auth::check() && Auth::user()->name === 'Admin' )
            
           <div class="deleteComment">
                  <form action="{{action('CommentsController@destroy')}}" method="post" class="destroyHabi">
                  @csrf
                  <button type="submit"><i class="fas fa-trash-alt"></i></button>
                  <input type="text" name="id" value="{{$comment->id}}"  class="inputDes"/>
                  <input type="text" name="idpost" value=" {{$comment->idpost}}"  class="inputDes"/>
                  <input type="text" name="iduser" value=" {{$comment->iduser}}"  class="inputDes"/>
                  <input type="text" name="content" value=" {{$comment->content}}"  class="inputDes"/>
                  
                  </form>
           </div>
           @endif
            
            </div>
            
            
            
            @endif
            
            
            
            
            
           
            
          
           @endif
           @endforeach
         @endforeach
         
         

         
         
         
        </div>
        
     <div class="numCome">{{$count}}</div>
     
        
        
        
        
        <div class="cont-btn-volver"><a href="{{route('post.index')}}" class="btn btn-info">Volver</a></div>
        
        
        
        
        
     </div>    











@stop


