<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        return view('albums.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Get filename with extension
        $filenameWithExt = $request ->file('cover_image')->getClientOriginalName();
        //Get simple file name
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //Get simple extension of file
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        //Set new file name with time stamp
        $filenameTostore = $filename.'_'.time().'.'.$extension;
        //Upload with new filename on specific path
        $path = $request->file('cover_image')->storeAs('public/album_covers',$filenameTostore);

        $album = new Album();
        $album->name = $request->input('name');
        $album->discription = $request->input('description');
        $album->cover_image = $request->file('cover_image');
        $album->save();
        return redirect('album/index')->with('success','Photo added in album successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
