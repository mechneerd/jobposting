<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//logout user 
Route::get('/logoutuser',[UserController::class,'logout'])->middleware('auth');


Route::get('/list/create',[ListingController::class,'create'])->middleware('auth');

Route::post('/list',[ListingController::class,'store']);

Route::get('/',[ListingController::class,'index']);

Route::get('/list/{listing}', function (Listing $listing) {

    
        return view('listing',[
           
            'listings'=>$listing,
        ]);

  
});

Route::get('/list/{listing}/edit', [ListingController::class,'edit']

)->middleware('auth');
Route::put('/update/{listing}', [ListingController::class,'update']

)->middleware('auth');
Route::get('/delete/{listing}', [ListingController::class,'delete']

)->middleware('auth');

Route::get('/register', [UserController::class,'create']

)->middleware('guest');


//create new user
Route::post('/users', [UserController::class,'store']);

//login view
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

Route::get('/posts/{id}',function($id){
    return response('post'.$id);
})->where('id','[0-9]+');


Route::get('/search',function(Request $request){
        dd($request->name);
});

