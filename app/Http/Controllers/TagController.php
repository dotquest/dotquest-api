<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\StoreUserRequest;

class TagController extends Controller
{
    public function index(){
        
        $dados = Tag::get();
                return response()->json($dados);
    }

    public function store(StoreUserRequest $request){
        Tag::create($request->all() );
        
        #dd("fim");
    }
    
    public function show($id){
        return Tag::findOrfail($id);
    }

    public function update(Request $request, $id){
        $cadastros = Tag::findOrfail($id);
        $cadastros->update($request->all());

    }

    function destroy($id){
        $cadastros = Tag::findOrfail($id);
        $cadastros->delete();
    }
   
}
