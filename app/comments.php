<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class comments extends Model
{
    use SoftDeletes; //deleted_at

    protected $table = 'comments';
    
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    protected $fillable = ['idpost', 'iduser', 'content']; //para definir los campos
    
    
    
    
    public function commentsUser() {          
        return $this->belongsTo('App\User', 'iduser');      //belongsTo para UNO
    }    
    
    
    public function commentsPost() {          
        return $this->belongsTo('App\Post', 'post');      //belongsTo para UNO
    }    
    
}
