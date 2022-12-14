<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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
Route::get('/', [ListingController::class, 'index']);

// show create Form
Route::get('/listing/create', [ListingController::class, 'create'])->middleware('auth');

// store listing data
Route::post('/listing', [ListingController::class, 'store'])->middleware('auth');

// show edit form
Route::get('/listing/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

//edit submit to update or update listing
Route::put('/listing/{listing}',[ListingController::class, 'update'])->middleware('auth');

//delete listing
Route::delete('/listing/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Single Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);

// show rwegister/create form
Route::get('/register',[UserController::class, 'create'])->middleware('guest');

//Create new User
Route::post('/users',[UserController::class, 'store']);

//Log User Out
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');

//Show login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

Route::post('/users/authecticate',[UserController::class,'authecticate']);

// Route::get('/listing/{id}',function($id){
//     $listing = Listing::find($id);

//     if($listing) {
//         return view('listing',[
//             'listing'=>$listing
//         ]);
//     }else{
//         abort('404');
//     }
// });

// Route::get('/hello', function() {
//     return "Hello World";
// });
// Route::get('/hello', function() {
//     return response("<h1>Hello World</h1>");
// });

// Route::get('/post/{id}', function($id){
//     return response("post ".$id);
// })->where ('id', '[0-9]+');

//commom resource routes:
// index -show all listings
// show - show single listing
// create - show from to edit listing
// store - store new listing
// edit - show form to edit listing
// update -update listing
// destroy - delete listing