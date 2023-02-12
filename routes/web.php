<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\EmployeeController;
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
Route::get('/listings', [ListingController::class, 'index']);


    // return view('listings', [
    //     'heading' => 'Latest Listings',
    //     'listings' => Listing::all()
    // ]);

// Show Create Form COMPANY
Route::get('/listings/create', [ListingController::class, 'create']);

// Show Create Form EMPLOYEES
Route::get('/employees/create-employees', [EmployeeController::class, 'create']);

// Store EMPLOYEES
Route::post('/employees', [EmployeeController::class, 'store']);

// Stores Listings Data COMPANY
Route::post('/listings', [ListingController::class, 'store']);

// Show Edit form EMPLOYEES
Route::get('/employees/{employee}/edit-employees', [EmployeeController::class, 'edit']);

// Show Edit form COMPANY
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update Listing EMPLOYEE
Route::put('/employees/{employee}', [EmployeeController::class, 'update']);

// Update Listing COMPANY
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Destroy Listing EMPLOYEE
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']);

// Destroy Listing COMPANY
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Logout User
Route::post('/logout', [UserController::class, 'logout']);

// Show Login Form
Route::get('/', [UserController::class, 'login']);

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// return view('listing', [
    //     'listing' => $listing
    // ]);
    
    // $listing = Listing::find($id);
    // if ($listing) {
    //     return view('listing', [
    //         'listing' => $listing
    //     ]);
    // }
    // else {
    //     abort('404');
    // }

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


//COMMON RESOURCE ROUTES (NAMING CONVENTIONS):
// index - show all listings
// show - show single listings
// create - show form to create new listing
// store - store new listing 
// edit - show form to edit listing 
// update - update listing 
// destroy - delete listing 

