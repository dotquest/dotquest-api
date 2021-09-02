<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class LoginPostController extends Controller
{
    public function index()
    {
        $post = auth()->suer()->posts;

        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }
    public function show($id)
    {
        $post = auth()->user()->posts()->find($id);

        if (!$post){
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 400);
        }
    

    return response() ->json([
        'success' => true,
        'data'  => $post->toArray()
    ],400);
    }
    public function store(Request $request)
    {
        $this->validadte($request,[
            'email' => 'required',
            'senha' => 'required'
        ]);
        $post = new Post();
        $post->email = $request->email;
        $post->senha = $request->senha;
        
        if (auth()->user()->posts()->save($post))
            return response()-json([
                'success' => true,
                'data' => $post->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'post not added'
            ], 500);
    }
    
}
