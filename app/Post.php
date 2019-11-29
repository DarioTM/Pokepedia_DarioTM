<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes; //deleted_at

    protected $table = 'post';
    
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    protected $fillable = ['iduser', 'subject', 'idpokemon', 'content']; //para definir los campos
    
    public function postComments(){
        return $this->hasMany('App\comments');
    }
    
    public function postUser() {          
        return $this->belongsTo('App\User', 'iduser');      //belongsTo para UNO
    }
}
