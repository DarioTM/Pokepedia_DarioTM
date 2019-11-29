<?php

namespace App\Http\Controllers;

use App\Post;
use App\Pokemon;
use App\User;
use App\comments;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
       
        $pokemons = Pokemon::All();
        
        $comments = comments::All();
        
        $posts = Post::All();
        
        $users = User::All(); 
        
     

        
         $datosPost = [
            'posts' => $posts,
            'pokemons' => $pokemons,
            'comments' => $comments,
            'users'=>$users,
            'user'=>$user

            ];
            
        return view('index.user')->with($datosPost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, post $post)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {

    }
 
}
