<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepostsRequest;
use App\Models\posts;

class PostsController extends Controller
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
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepostsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepostsRequest $request)
    {
        $post = new posts();
        $post->title = $request->title;
        $post->extract = $request->extract;
        $post->content = $request->content;
        $post->expirable = $request->expirable;
        $post->caducable = $request->caducable;
        $post->comentable = $request->comentable;
        $post->access = $request->access;

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = posts::find($id);
        return view('posts.form', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepostsRequest  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(StorepostsRequest $request, posts $id)
    {
        $post = posts::find($id);
        $post->title = $request->title;
        $post->extract = $request->extract;
        $post->content = $request->content;
        $post->caducable = $request->caducable;
        $post->expirable = $request->expirable;
        $post->comentable = $request->comentable;
        $post->public = $request->public;
        
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(posts $id)
    {
        $post = posts::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
