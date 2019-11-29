<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Pokemon extends Model
{
    // use SoftDeletes; //deleted_at

    protected $table = 'pokemon';
    
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    protected $fillable = ['name', 'height', 'weight', 'image']; //para definir los campos
    
    
    public function pokemonPost() {          
        return $this->hasMany('App\Post');
    }
    
    public function pokemonAbilityPokemon(){
        return $this->hasMany('App\AbilityPokemon');
    }
}
