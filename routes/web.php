<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('listings',[
        'heading'=>'Latest listing',
        'listings'=>[
            [
                'id'=> 1,
                'title'=>"listing One",
                'description'=>"that about descriptions",
            ],
            [
                'id'=> 2,
                'title'=>"listing two",
                'description'=>"that about descriptions",
            ]
        ]
    ]);
});

// Route::get('/hello', function() {
//     return "Hello World";
// });
// Route::get('/hello', function() {
//     return response("<h1>Hello World</h1>");
// });

// Route::get('/post/{id}', function($id){
//     return response("post ".$id);
// })->where ('id', '[0-9]+');