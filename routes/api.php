<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Add new Category
Route::post("category/add","CategoriesController@store");

//Update Category
Route::put("category/update/{id}","CategoriesController@update");

// Show a Specific Category
Route::get("category/{id}","CategoriesController@show");

// Delete a category
Route::delete("category/delete/{id}","CategoriesController@destroy");

//Add new Course
Route::post("course/add","CoursesController@store");

//Update Course
Route::put("course/update/{id}","CoursesController@update");

// Show a Specific Course
Route::get("course/{id}","CoursesController@show");

// Delete a Course
Route::delete("course/delete/{id}","CoursesController@destroy");

//paginate 10 categories
Route::get("category","CategoriesController@index");

//paginate 10 courses
Route::get("course","CoursesController@index");

//Upload Image
Route::post("imageUpload","ImageController@store");