<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Crypt;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // validācija, izveido piezīmi un saglabā lietotāja ievadītos datus (nosaukumu, saturu, lietotāja ID), pāradresē uz piezīmju lapu
        $request->validate(Post::$rules);
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // meklē pieprasīto piezīmi
        $post = Post::findOrFail($id);
        // pārbauda, vai piezīmi mēģina apskatīt piezīmes autors
        $this->authorize('view', $post);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // meklē pieprasīto piezīmi
        $post = Post::findOrFail($id);
        // pārbauda, vai piezīmi mēģina apskatīt piezīmes autors
        $this->authorize('update', $post);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // notiek piezīmes validācija, piezīmi var atjaunot tikai tās autors, tiek atjaunoti visi piezīmes dati
        $request->validate(Post::$rules);
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // meklē pieprasīto piezīmi, piezīmi var dzēst tikai tās autors
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts');
    }
}
