@extends('index')

@section('content')



<div class="container-show">
    
    <div class="showIMG">
        <div>
            
            @if (file_exists(public_path('imgpokemon/'.$pokemon->id.'.png')))
            
                <img src="{{url('imgpokemon/'.$pokemon->id.'.png')}}"></img>
                
            @else
            
                <img style="width:100%" src="{{url('sinfoto.png')}}"></img>
                
            @endif

            
        </div>
    </div>
    
    <div class="showDat">
        <!--<div class="showDat1"><h1>{{$pokemon->name}}</h1><h1>#{{$pokemon->id}}</h1></div>-->
        <div class="showDat1"><h1>{{$pokemon->name}}</h1></div>
        
        <div class="showDat2">
            <div><h4>Altura: </h4><h5>{{$pokemon->height}}</h5></div>
            <div><h4>Peso: </h4><h5>{{$pokemon->weight}}</h5></div>
        </div>
        
        <div class="showDat3">
            
            <div><h4>Habilidades</h4></div>

            <div class="showDat3-2">
                
                 @foreach($abilitysPoke as $abilityPoke)
                
                    @if($abilityPoke->idpokemon === $pokemon->id)
                    
                         @foreach($abilitys as $ability)
                         
                             @if($abilityPoke->idability === $ability->id)
                               
                               <div class="showDat3-2-1">
                                     
                                <div><h5> • {{$ability->ability}} </h5></div>
                                 @if(Auth::check())
                                <div>
                                    <form action="{{action('AbilityPokemonController@destroy')}}" method="post" class="destroyHabi">
                                    @csrf
                                     <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                    <input type="text" name="id" value="{{$abilityPoke->id}}"  class="inputDes"/>
                                    <input type="text" name="idability" value="{{$abilityPoke->idability}}"  class="inputDes"/>
                                    <input type="text" name="idpokemon" value="{{$abilityPoke->idpokemon}}"  class="inputDes"/>
                                    
                                    </form>
                                </div>
                                @endif
                               </div>  
                             @endif    
                             
                        @endforeach
                    
                    @endif
                    
                @endforeach
                
            </div>
        </div>
        
        @if(Auth::check())
        <div class="showDat4">
        
        
        <div class="showDat4-1"><h1>Añadir habilidad</h1></div>
        
        <div class="showDat4-2">
            
        <form method="POST" action="{{action('AbilityPokemonController@store')}}"  class="" accept-charset="UTF-8">
            @csrf

          
            <div class="form-group row">
                  
                <select name="idability"class="form-control">
                  <option >Selecciona una habilidad</option>
                  
              
                  @foreach($abilitys as $ability)
                
                  <option value="{{$ability->id}}">{{$ability->id}}-{{$ability->ability}}</option>
             
                  @endforeach
            
                </select>
            
                @error('idpokemon')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                  </div>
                @enderror
            
            </div> 
            
            
            <input type="text" name="idpokemon" value="{{$pokemon->id}}"  class="inputDes" />
         
                   <input type="submit" value="Enviar" class="btn-enviar">
         
        
        </form>  
            
         </div>   
            
            
            
            
            
        </div>
       @endif 
    </div>
    
    
</div>







 @foreach($posts as $post)

 

  @if($pokemon->id ==  $post->idpokemon )
  
  
  

 
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
             
                 @if($post->idpokemon == $pokemon->id)
                 <h5>Pokémon relacionado, <a href="{{url('pokemon/'.$pokemon->id)}}" >{{$pokemon->name}}</a></h5>
                 @endif
        
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

@endif


 @endforeach





<div class="cont-btn-volver" style="width:100%; text-align:center"><a href="{{route('pokemon.index')}}" class="btn btn-info">Volver</a></div>
 

@stop
