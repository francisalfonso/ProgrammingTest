<?php

use Illuminate\Http\Request;
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

// All Listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]);
});

//Single Listing
Route::get('/listings/{id}', function($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});

// Route::get('/hi', function () {
//     return 'Hello World';
// });

// Route::get('/posts/{id}', function ($id) {
//     dd($id); // to show that value of debugging
//     ddd($id); // to show that value of debugging in detailed
//     return response('Post '. $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request){
//     dd($request->name. ' ' . $request->city);
// });