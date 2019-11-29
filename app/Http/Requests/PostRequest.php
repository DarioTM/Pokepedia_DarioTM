<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }



    public function messages()
    {
        $required   =   'El campo :attribute es obligatorio';
        $min        =   'La longitud mínima del campo :attribute es :min';
        $max        =   'La longitud máxima del campo :attribute es :max';
        $unique     =   'El valor del campo :atribute es unico';

        
        
        return [
                'iduser.required'                   =>  $required,
                
                'subject.required'                     =>$required,
                'subject.max'                          =>$max,
                'subject.min'                          =>$min,
     
                
                'idpokemon.required'                   =>$required,

                
                'content.required'                   =>$required,
                'content.max'                        =>$max,
                'content.min'                        =>$min,
                
         
            

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'id'            =>  '',
                'iduser'        =>  'required',
                'subject'       =>  'required|max:100|min:3',
                'idpokemon'     =>  'required',
                'content'     =>  'required|min:10',

        ];
    }
}
