<?php

namespace App\Http\Controllers;

use App\AbilityPokemon;
use App\Pokemon;
use App\Ability;
use App\Http\Requests\AbilityPokemonRequest;
use Illuminate\Http\Request;

class AbilityPokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbilityPokemonRequest $request,Pokemon $pokemon)
    {
        $input = $request -> validated();//array asociativo con los valores validados y limpios
        $abilityPokemon = new AbilityPokemon($input);
        
        // var_dump($comments->idpost);
        
        $idpokemon = $abilityPokemon->idpokemon;

        
        try{
            $result = $abilityPokemon -> save();
        

         }catch(\Exception $e) {
           return redirect('pokemon/'.$idpokemon);

         }
         
        return redirect('pokemon/'.$idpokemon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AbilityPokemon  $abilityPokemon
     * @return \Illuminate\Http\Response
     */
    public function show(AbilityPokemon $abilityPokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AbilityPokemon  $abilityPokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(AbilityPokemon $abilityPokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AbilityPokemon  $abilityPokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbilityPokemon $abilityPokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AbilityPokemon  $abilityPokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbilityPokemonRequest $request, AbilityPokemon $abilityPokemon)
    {
        $id = $request->id;
         $idpokemon = $request->idpokemon;
        AbilityPokemon::destroy($id);
        
         return redirect('pokemon/'.$idpokemon);
       
    }
}
