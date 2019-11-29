@extends('index')

@section('content')

@php($count=0)
 @foreach($pokemons as $pokemon)
 @if($pokemon->deleted_at === null)
 
     
        @php($count++)

        <div class="contPokemon">
            
            <!--<div class="pokeID">-->
            <!--    <div><h1>#{{$count}}</h1></div>-->
            <!--    <div><h1>#{{$pokemon->id}}</h1></div>-->
            <!--</div>-->
            @if(Auth::check())
            <div class="pokeEdit">
                <div>
                    <form action="{{url('pokemon/'.$pokemon->id)}}" method="post" class="destroy">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
           
                <div><a href="{{url('pokemon/'.$pokemon->id.'/edit')}}"><i class="far fa-edit"></i></a></div>
            </div>
             @endif  
            <div class="pokeIMG">
                <div>
                        @if (file_exists(public_path('imgpokemon/'.$pokemon->id.'.png')))
                        
                        <img src="{{url('imgpokemon/'.$pokemon->id.'.png')}}"></img>
                        
                        @else
                        
                        <img style="width:100%" src="{{url('sinfoto.png')}}"></img>
                        
                        @endif
                </div>
            </div>

            <div class="pokeDat">
                <div><h1>{{$pokemon->name}}</h1></div>
                <div><h5>Altura: </h5><p>{{$pokemon->height}}</p></div>
                <div><h5>Peso: </h5><p>{{$pokemon->weight}}</p></div>
               <div><a href="{{url('pokemon/'.$pokemon->id)}}" class="btn btn-info">Ver más</a></div>
            </div>
        </div>




@endif
@endforeach


<div class="contPokemon2">
    <div>
        {{$pokemons->links()}}
    </div>    
@if(Auth::check())    
    <div class="pokemonadd">
    <a href="{{url('pokemon/create')}}" class="btn btn-success" >Agregar Pokemon</a>
    </div>
@endif
</div>

@stop


