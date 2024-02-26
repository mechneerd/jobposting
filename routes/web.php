<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

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
