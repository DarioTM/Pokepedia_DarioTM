@extends('index')

@section('content')



 @foreach($posts as $post)

   
   
    

 
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
                 @foreach($users as $user)
                 @if($post->iduser == $user->id)
                 <h5>Creado por, <a href="{{url('user/'.$user->id)}}" >{{$user->name}}</a></h5>
                 @endif
                 @endforeach
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



 @endforeach




<div class="contPokemon2">
    <div>
        {{$posts->links()}}
    </div>    
@if(Auth::check())    
    <div class="pokemonadd">
    <a href="{{url('post/create')}}" class="btn btn-success" >Crear Post</a>
    </div>
@endif
</div>


@stop


