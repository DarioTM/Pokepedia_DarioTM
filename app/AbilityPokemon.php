<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class AbilityPokemon extends Model
{


    protected $table = 'ability_pokemon';
    
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    protected $fillable = ['idability', 'idpokemon']; //para definir los campos
    
    
    
    public function AbilityPokemonPokemon() {          
        return $this->belongsTo('App\Pokemon', 'idpokemon');      //belongsTo para UNO
    }
    
    
    public function AbilityPokemonAbility() {          
        return $this->belongsTo('App\Ability', 'idability');      //belongsTo para UNO
    }
    
}
