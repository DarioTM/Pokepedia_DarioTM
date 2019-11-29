@extends('index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card">
    
                <div class="card-header">{{ __('Crear Post') }}</div>
                <div class="card-body">
                    
                   <form method="POST" action="{{action('PostController@store')}}"  class="mx-auto w-100 p-3 text-white " accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        
                         <div class="form-group row">
                            <input type="text"  class="inputDes" name="iduser" value="{{$idsession}}" />

                
                        </div>
                        
                        <div class="form-group row">
                            <label class="text-secondary text-left">Titulo:</label>
                            <input type="text"  class="form-control" name="subject" id="subject" placeholder="Titulo" />
                            @error('subject')
                              <div class="alert alert-danger" role="alert">
                                {{$message}}
                              </div>
                            @enderror
                
                        </div>
                        
                        <div class="form-group row">
                            <label class="text-secondary text-left">ID Pokemon:</label>

                              
                            <select name="idpokemon" class="form-control">
                              <option >Selecciona un ID</option>
                              
                              @foreach($pokemons as $pokemon)
                              <option value="{{$pokemon->id}}" >{{$pokemon->id}}-{{$pokemon->name}}</option>
    
                              @endforeach
                            </select>
                  
                            @error('idpokemon')
                              <div class="alert alert-danger" role="alert">
                                {{$message}}
                              </div>
                            @enderror
                
                        </div> 
                            
                        
                        <div class="form-group row">
                            <label class="text-secondary text-left">Contenido:</label>
                            <textarea class="form-control" name="content" id="content" placeholder="Contenido"></textarea>
       
                            @error('content')
                              <div class="alert alert-danger" role="alert">
                                {{$message}}
                              </div>
                            @enderror
                
                        </div>
  
                            
                        
                        
                        <input type="submit" value="crear" class="btn btn-info mt-3">
                        <a href="{{route('post.index')}}" class="btn btn-info mt-3">Volver</a>
                        </div> 
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
    
   
<!--necesario para visualizar pokemon-->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script><script  src="./script.js"></script>

    
@stop