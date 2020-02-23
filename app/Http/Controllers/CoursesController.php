<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\courses as courseResource;
use App\Course;
use App\Image;
use File;
use Str;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::paginate(10);
        return new courseResource($course);
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
        $course = new Course();
        $course->name = $request->input("name");
        $slug = $request->input("name")." ".time();
        $slug = Str::slug($slug,"-");
        $course->slug = $slug;
        $course->description = $request->input("description");
        $course->category_id = $request->input("category_id");
        if($course->save())
        {
            return new courseResource($course);
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
        $course = Course::find($id);
        return new courseResource($course);
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
        $course = Course::find($id);
        $course->name = $request->input("name");
        $course->slug = $request->input("slug");
        $course->description = $request->input("description");
        $course->category_id = $request->input("category_id");
        if($course->save())
        {
            return new courseResource($course);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        $image = Image::where("imageable_id","=",$id)->where("imageable_type","=","course")->first();
        if(!empty($image))
        {
            File::delete("images/".$image->file_name);
            $image_del = Image::find($image->id);
            $image_del->delete();
        }
        return new courseResource($course);


    }
}
