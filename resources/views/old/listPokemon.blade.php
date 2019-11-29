@extends('index')

@section('content')



 @foreach($pokemons as $pokemon)
 @if($pokemon->deleted_at === null)
 
 
 

 


<table class="table ">
    <thead class="thead-dark ">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Image</th>
            <th>habilidad</th>

            
        </tr>
    </thead>
    
    <tbody>
       
        <tr>
            <img src="{{url('imgpokemon/'.$pokemon->id.'.png')}}"></img>
            <td>{{$pokemon->id}}</td>
            <td>{{$pokemon->name}}</td>
            <td>{{$pokemon->height}}</td>
            <td>{{$pokemon->weight}}</td>
            <td>{{$pokemon->image}}</td>
            <td><a href="{{url('pokemon/'.$pokemon->id)}}" class="btn btn-info">Ver</a></td>
            <td><a href="{{url('pokemon/'.$pokemon->id.'/edit')}}" class="btn btn-success">Editar</a></td>
            <td>
                <form action="{{url('pokemon/'.$pokemon->id)}}" method="post" class="destroy">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar" class="btn btn-danger"/>
                </form>
            </td>
            @foreach($abilitysPoke as $abilityPoke)
            
                @if($abilityPoke->idpokemon === $pokemon->id)
                
                     @foreach($abilitys as $ability)
                     
                         @if($abilityPoke->idability === $ability->id)
                   
                             <td>{{$ability->id}} {{$ability->ability}}</td>
                             
                         @endif    
                         
                    @endforeach
                
                @endif
                
            @endforeach
            
            
        </tr>
        
        
   </tbody>
   
</table>

@endif
@endforeach

{{$pokemons->links()}}

<a href="{{url('pokemon/create')}}" class='btn btn-info'>Agregar Pokemon</a>

<img src="http://3.90.169.173/web/pokepedia/public/subir"></img>




<img src="{{url('assets/img/pokeball.png')}}"></img>

 <div style="background-image: url(../../public/assets/img/pokeball.png);background-position: center;background-size: contain;background-repeat: no-repeat;height:200px;width:200px; "></div>


@stop
