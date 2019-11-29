<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Ability;
use App\AbilityPokemon;
use App\comments;
use App\Post;
use App\User;
use App\Http\Requests\PokemonRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        
        // $pokemons = DB::table('pokemon')->paginate(3);
        
        $pokemons = Pokemon::paginate(3);
        
         $datosPokemon = [
            'pokemons' => $pokemons,
            ];
            
        
        
        $abilitysPoke = DB::table('ability_pokemon')->get();
        
        $abilitys = DB::table('ability')->get();
        
        $ip = $request -> ip();
        
        

        

            
        return view('index.listPokemon')->with($datosPokemon,['abilitysPoke'=>$abilitysPoke, 'abilitys'=>$abilitys]);
        
        
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abilitysPoke = DB::table('ability_pokemon')->get();
        $abilitys = DB::table('ability')->get();
        
        return view('index.create')->with(['abilitysPoke'=>$abilitysPoke, 'abilitys'=>$abilitys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PokemonRequest $request)
    {
                    

       $input = $request -> validated();//array asociativo con los valores validados y limpios
        $pokemon = new Pokemon($input);

        try{
            $result = $pokemon -> save();
                    
        if($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        // $target = '../../../upload/';
        $target = 'imgpokemon/';

        $idpokemon = $pokemon->id;
        
        // $name = $file->getClientOriginalName();
        $name = $idpokemon.'.png';
        $file->move($target, $name);

        }

        
            
         }catch(\Exception $e) {
            return redirect(route('pokemon.create'));
              
         }
         
         return redirect(route('pokemon.index'))->with(['result' => $result, 'op' => 'store']);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon,User $user)
    {
        // $abilitysPoke = DB::table('ability_pokemon')->get();
        // $abilitys = DB::table('ability')->get();
        
        $abilitysPoke = AbilityPokemon::All();
        $abilitys = Ability::All();
        $comments = comments::All();
        $posts = Post::All();
        $users = User::All(); 
        
        $datospoke = [
            'abilitysPoke' =>   $abilitysPoke,
            'abilitys' =>   $abilitys,
            'pokemon'=>$pokemon,
            'posts' => $posts,
            'comments' => $comments,
            'users'=>$users,
            'user'=>$user
            
            ];
        
        return view('index.show')->with($datospoke);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon)
    {
        return view('index.edit')->with(['pokemon' => $pokemon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(PokemonRequest $request, Pokemon $pokemon)
    {
        

        $input = $request->validated();
         try{
            $result = $pokemon->update($input);
                    if($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        // $target = '../../../upload/';
        $target = 'imgpokemon/';

        $idpokemon = $pokemon->id;
        
        // $name = $file->getClientOriginalName();
        $name = $idpokemon.'.png';
        $file->move($target, $name);

        }
         }catch(\Exception $e){
             $result = false;
             $error =['name'    => 'El nombre utilizado ya existe en otro producto.'];
             return redirect('pokemon/'.$pokemon->id.'/edit')->withErrors($error)->withInput();
         }
         
         
         return redirect(route('pokemon.index'))->with(['result' => $result, 'op' => 'update']);
    }

    /**
     * Remove the specified resource from  storage.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon)
    {
        try{
            $pokemon->delete();
            $result = true;
        }catch(\Exception $e){
            $result = false;
        }
        return redirect(route('pokemon.index'))->with(['result' => $result, 'op' => 'destroy']);
    }
    
    
    
    
}
