<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommunityRequest;
use App\Models\Community;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Community::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/communities/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommunityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommunityRequest $request)
    {
        $community = new Community();
        $community->name = $request->name;
        $community->description = $request->description;
        $community->save();

        return redirect()->route('community.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Community::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $community = Community::find($id);
        return view('/communities/edit', compact('community'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommunityRequest  $request
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommunityRequest $request, int $id)
    {
        $data = $request->validated();
        $community = Community::where('id', $id)->first();
        $community->title = $data['name'];
        $community->extract = $data['description'];

        $community->save();

        return redirect()->route('community.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $community = Community::where('id', $id)->first();
        $community->delete();
        return redirect()->route('community.index');
    }
}
