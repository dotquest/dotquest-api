<?php

namespace App\Http\Requests;

use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class TagValidation extends FormRequest
{
    public function rules()
    {
       #Validação para o nome ser um campo obrigatorio
        return [
            'name' =>['required', new FullName]
            
        ];
        
    }

   
}
