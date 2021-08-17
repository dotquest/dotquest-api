<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Http\Requests\TurmaValidation;

class CadTurmaController extends Controller
{
    public function index(){
        $dados = Turma::get();
        return response()->json($dados);                
    }

    public function store(TurmaValidation $request){
        Turma::create($request->all());
        
    }

    public function update(Request $request, $id){
        $cadastro = Turma::findOrfail($id);
        $cadastro->update($request->all());
    }   
}
