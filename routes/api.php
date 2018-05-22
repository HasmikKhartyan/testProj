<?php

use Illuminate\Http\Request;
use App\Http\Middleware;
use App\User;
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

//Route::group(['middleware' => 'auth'], function(){
    Route::get('users/{user}/notes/','UserNotesController@index');
    Route::post('users/{user}/notes', 'UserNotesController@store');
    Route::delete('users/{user}/notes/{note}', 'UserNotesController@delete');
    Route::put('users/{user}/notes/{note}','UserNotesController@update');
//});
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
////Route::post('login', 'AuthController@login');
//
//

//Route::get('users/{user}/notes/',function (Request $request,User $user) {
//    var_dump($user->hasAccess(['create-note']));
//    exit;
//    return $request->user()->hasAccess(['create-note']);
//} );//'UserNotesController@index'
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
