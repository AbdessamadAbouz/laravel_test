<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Http\Resources\Image as imageResource;

class ImageController extends Controller
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
    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:'. implode(",",config('imageable.mimes')).'|max:'. config('imageable.max_file_size'),
        ]);
        $image = new Image();
        $image->file_name = $request->input("file_name").time().'.'.request()->image->getClientOriginalExtension();
        $image->imageable_type = $request->input("imageable_type");
        $image->imageable_id = $request->input("imageable_id");
        $images = Image::where("imageable_type","=",$image->imageable_type)->where("imageable_id","=",$image->imageable_id)->first();
        if(empty($images))
        {
            request()->image->move(public_path('images'), $image->file_name);
            if($image->save())
            {
                return new imageResource($image);
            }
        }
        else
        {
            return new imageResource(["error" =>$image->imageable_type." already have an image"] );
        }
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
