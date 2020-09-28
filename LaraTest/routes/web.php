<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAge;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'NoteController@index');


Route::get('Test', function(){
    return "Test success";
});
Route::redirect('/fb', 'NoteController');
Route::view('/page', 'test', ['name'=>'Rocky']);
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
})->middleware('CheckRequest');
Route::get('UnAuthorized/{msg}', function($msg){
    return "Permision Denied!! due to : ".$msg;
});

Route::resource('notes', 'NoteController');

Route::middleware('CheckRequest')->group(function () {
    Route::get('G1/{id}', function ($id) {
        return "<br> Hellow from G1.";
    });

    Route::get('G2/{id}', function ($id) {
        return "<br> Hellow from G2.";
    })->withoutMiddleware('CheckRequest');
});

