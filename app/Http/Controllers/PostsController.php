<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepostsRequest;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Post::all());
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
        $post = new Post();
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
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Post::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepostsRequest  $request
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function update(StorepostsRequest $request, int $id)
    {
        $data = $request->validated();


        $post = Post::where('id', $id)->first();

        $post->title = $data['title'];
        $post->extract = $data['extract'];
        $post->content = $data['content'];
        $post->caducable = $data['caducable'];
        $post->expirable = $data['expirable'];
        $post->comentable = $data['comentable'];
        $post->access = $data['access'];


        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
