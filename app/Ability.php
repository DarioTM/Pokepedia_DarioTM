<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Ability extends Model
{
    use SoftDeletes; //deleted_at

    protected $table = 'ability';
    
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    protected $fillable = ['ability']; //para definir los campos
    
    
    public function abilityAbilityPokemon(){
        return $this->hasMany('App\AbilityPokemon');
    }
}
