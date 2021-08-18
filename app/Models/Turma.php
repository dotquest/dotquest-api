<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = "turmas";
    public $timestamps = false;
    protected $fillable = [
        'nomeTurma',
        'descrição',
        'ano'
    ];
}
