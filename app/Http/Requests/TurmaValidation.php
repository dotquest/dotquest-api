<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TurmaValidation extends FormRequest
{
  public function rules()
    {
        return [
        'nomeTurma' => 'required|max:45',
        'descricao'=> 'required',
        'ano'=> 'required|min:4|max:4',
    ];
       
    }
}
