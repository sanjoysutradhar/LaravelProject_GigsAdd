<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
// All Listing
Route::get('/', function () {
    return view('listings',[
        'heading'=>'Latest listing',
        'listings'=> Listing::all()
    ]);
});

//Single Listing
Route::get('/listing/{id}',function($id){
    return view('listing',[
        'listing'=>Listing::find($id)
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