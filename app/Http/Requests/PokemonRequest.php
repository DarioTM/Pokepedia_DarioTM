<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PokemonRequest extends FormRequest
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
                'nombre.required'                   =>  $required,
                'nombre.min'                        =>  $min,
                'nombre.max'                        =>  $max,
                'nombre.unique'                     =>  $unique,
                
                'name.required'                     =>$required,
                'name.max'                          =>$max,
                'name.min'                          =>$min,
                'name.unique'                       =>$unique,
                
                'height.required'                   =>$required,
                'height.max'                        =>$max,
                'height.min'                        =>$min,
                
                'weight.required'                   =>$required,
                'weight.max'                        =>$max,
                'weight.min'                        =>$min,
                
         
            

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
                'id'         =>  '',
                'name'       =>  'required|max:30|min:3',
                'height'     =>  'required|max:6|min:3',
                'weight'     =>  'required|max:6|min:3',
                'image'      =>  '',
          
                
                

        ];
    }
}
