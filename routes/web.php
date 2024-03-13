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
Route::get('/list/create',[ListingController::class,'create']);

Route::post('/list',[ListingController::class,'store']);

Route::get('/',[ListingController::class,'index']);

Route::get('/list/{listing}', function (Listing $listing) {

    
        return view('listing',[
           
            'listings'=>$listing,
        ]);

  
});

Route::get('/list/{listing}/edit', [ListingController::class,'edit']

);
Route::put('/update/{listing}', [ListingController::class,'update']

);
Route::get('/delete/{listing}', [ListingController::class,'delete']

);

Route::get('/register', [UserController::class,'create']

);


//create new user
Route::post('/users', [UserController::class,'store']

);
Route::get('/hello',function(){
    return response('<h1>hello</h1>',200)
    ->header('content-type','text/plain')
    ->header('food','apple');
});

Route::get('/posts/{id}',function($id){
    return response('post'.$id);
})->where('id','[0-9]+');


Route::get('/search',function(Request $request){
        dd($request->name);
});

