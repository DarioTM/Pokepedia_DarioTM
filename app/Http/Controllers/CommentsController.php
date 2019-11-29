<?php

namespace App\Http\Controllers;

use App\comments;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CommentsRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; use Illuminate\Foundation\Auth\RegistersUsers;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentsRequest $request,Post $post)
    {
       
        $input = $request -> validated();//array asociativo con los valores validados y limpios
        $comments = new comments($input);
        
        // var_dump($comments->idpost);
        
        $idpost = $comments->idpost;
        
        try{
            $result = $comments -> save();

         }catch(\Exception $e) {
            return redirect(route('pokemon.create'));

         }
         
        return redirect('post/'.$idpost);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentsRequest $request,comments $comments)
    {
        $id = $request->id;
         $idpost = $request->idpost;
        comments::destroy($id);
        
         return redirect('post/'.$idpost);
    }
}
