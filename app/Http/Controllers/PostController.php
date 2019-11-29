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

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $comments = comments::All();
                
        $posts = Post::paginate(3);
        
        $pokemons = Pokemon::All();
        
        $users = User::All();
        
         $datosPost = [
            'posts' => $posts,
            'pokemons' => $pokemons,
            'users' =>  $users,
            'comments'  =>  $comments
            ];
            

            
        return view('index.posts')->with($datosPost);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idsession = Auth::id();
        $pokemons = Pokemon::All();

        $datosPost = [
            'pokemons' => $pokemons,
            'idsession' => $idsession
        ];
        return view('index.createPost')->with($datosPost);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
              $input = $request -> validated();//array asociativo con los valores validados y limpios
        $post = new Post($input);
        

        
        try{
            $result = $post -> save();
            
         }catch(\Exception $e) {
            return redirect(route('post.create'));
              
         }
         
         return redirect(route('post.index'))->with(['result' => $result, 'op' => 'store']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,post $post)
    {
        $idsession = Auth::id();
 
       
        $pokemons = Pokemon::All();
        
        $comments = comments::All();
        
        $users = User::All();
        
         $datosPost = [
            'post' => $post,
            'pokemons' => $pokemons,
            'users' =>  $users,
            'comments' => $comments,
            'idsession' => $idsession
            ];

        return view('index.showPost')->with($datosPost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {


        $pokemons = Pokemon::All();

        $datosPost = [

            'pokemons' => $pokemons,
            'post'  =>  $post

        ];
        

  
        
       return view('index.editPost')->with($datosPost);
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

        $input = $request->validated();
         try{
            $result = $post->update($input);
         }catch(\Exception $e){
             $result = false;
             $error =['name'    => 'El nombre utilizado ya existe en otro producto.'];
             return redirect('post/'.$post->id.'/edit')->withErrors($error)->withInput();
         }
         
         
         return redirect(route('post.index'))->with(['result' => $result, 'op' => 'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        try{
            $post->delete();
            $result = true;
        }catch(\Exception $e){
            $result = false;
        }
        return redirect(route('post.index'))->with(['result' => $result, 'op' => 'destroy']);
    }
 
}
