<?php

    use Illuminate\Http\Request;

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

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });




Route::group(['prefix'=>'company'],function() {

    Route::post('/createCompany', ['uses' => 'CompanyController@create']);

    Route::get('/dashboard', ['uses' => 'CompanyController@index']);

    Route::get('/show/{user_id}', ['uses' => 'CompanyController@show']);

    Route::patch('/updateCompany/{user_id}', ['uses' => 'CompanyController@updateCompany']);

    Route::delete('/destroy/{user_id}', ['uses' => 'CompanyController@destroy']);


});

Route::group(['prefix'=>'user'],function() {

    Route::post('/createUser', ['uses' => 'UsersController@createUser']);

    Route::get('/index', ['uses' => 'UsersController@index']);

    Route::patch('/updateUser/{user_id}', ['uses' => 'UsersController@updateUser']);

    Route::get('/show/{user_id}', ['uses' => 'UsersController@show']);

    Route::delete('/destroy/{user_id}', ['uses' => 'UsersController@destroy']);

});