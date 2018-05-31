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

//Auth::routes();
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('users/{user}/notes/{account_id?}','UserNotesController@index')->middleware('before-action:list-note');
    Route::post('users/{user}/notes', 'UserNotesController@store')->middleware('before-action:create-note');
    Route::delete('users/{user}/notes/{note}', 'UserNotesController@delete')->middleware('before-action:delete-note');
    Route::put('users/{user}/notes/{note}','UserNotesController@update')->middleware('before-action:update-note');
});
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
////Route::post('login', 'AuthController@login');

//Route::get('users/{user}/notes',function (Request $request,User $user) {

//    $accountId = 1;
//   $user1  = new User();
//////    $user->hasAccess();
//////    $userAccount = User::get($accountId);
//////    $gr = 'publish-note';
//$ee = 'create-note';
//  var_dump($user1->hasAccess([$ee],$accountId));
//    exit;
//    return $request->user()->hasAccess(['publish-note']);
//} );//'UserNotesController@index'

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'UserController@details');
});
Route::middleware('auth:api')
    ->get('/user', function (Request $request) {

        return $request->user();
    });
