@extends('index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card">
    
                <div class="card-header">{{ __('Crear') }}</div>
                <div class="card-body">
                    
                   <form method="POST" action="{{action('PokemonController@store')}}"  class="mx-auto w-100 p-3 text-white " accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        
                       
                        
                         <div class="form-group row">
                            <label class="text-secondary text-left">Nombre:</label>
                            <input type="text"  class="form-control" name="name" id="name" placeholder="nombre" />
                            @error('name')
                              <div class="alert alert-danger" role="alert">
                                {{$message}}
                              </div>
                            @enderror
                
                        </div>
                        
                        <div class="form-group row">
                            <label class="text-secondary text-left">Altura:</label>
                            <input type="text"  class="form-control" name="height" id="height" placeholder="Altura" />
                            @error('height')
                              <div class="alert alert-danger" role="alert">
                                {{$message}}
                              </div>
                            @enderror
                
                        </div>
                        
                        <div class="form-group row">
                            <label class="text-secondary text-left">Peso:</label>
                            <input type="text"  class="form-control" name="weight" placeholder="Peso"  id="weight"  />
                            @error('weight')
                              <div class="alert alert-danger" role="alert">
                                {{$message}}
                              </div>
                            @enderror
                
                        </div> 
                        
                        <!--<div class="form-group row">-->
                        <!--    <label class="text-secondary text-left">Habilidad pokemon:</label>-->

                              
                        <!--    <select name="idability"class="form-control">-->
                        <!--      <option >Selecciona una habilidad</option>-->
                              
                          
                        <!--      @foreach($abilitys as $ability)-->
                            
                        <!--      <option value="{{$ability->id}}">{{$ability->id}}-{{$ability->ability}}</option>-->
                         
                        <!--      @endforeach-->
               
                        <!--    </select>-->
                  
                        <!--    @error('idpokemon')-->
                        <!--      <div class="alert alert-danger" role="alert">-->
                        <!--        {{$message}}-->
                        <!--      </div>-->
                        <!--    @enderror-->
                
                        <!--</div> -->
                            
                        <div class="form-group row">
                            <!--<label class="text-secondary text-left">Imagen</label>-->
                            <!--<input type="file"  class="form-control" name="image" placeholder="Peso"  id="image"   /> -->
                            
                            <section class="cont-file">
                              <div class="cont-file">
                                <div class="cont-file">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="control-label">Upload File</label>
                                        <div class="preview-zone hidden">
                                          <div class="box box-solid">
                                            <div class="box-header with-border">
                                              <div><b>Vista Previa</b></div>
                                              <!--<div class="box-tools pull-right">-->
                                              <!--  <button type="button" class="btn btn-danger btn-xs remove-preview">-->
                                              <!--    <i class="fa fa-times"></i> Reset This Form-->
                                              <!--  </button>-->
                                              <!--</div>-->
                                            </div>
                                            <div class="box-body"></div>
                                          </div>
                                        </div>
                                        <div class="dropzone-wrapper">
                                          <div class="dropzone-desc">
                                            <i class="glyphicon glyphicon-download-alt"></i>
                                            <p>Elija un archivo de imagen o arrástrelo aquí.</p>
                                          </div>
                                          <input type="file" name="image" class="dropzone">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            
                                  <!--<div class="row">-->
                                  <!--  <div class="col-md-12">-->
                                  <!--    <button type="submit" class="btn btn-primary pull-right">Upload</button>-->
                                  <!--  </div>-->
                                  <!--</div>-->
                                </div>
                              </div>
                            </section>
    
  
                            
                        </div> 
                        
                        <input type="submit" value="crear" class="btn btn-info mt-3">
                        <a href="{{route('pokemon.index')}}" class="btn btn-info mt-3">Volver</a>
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