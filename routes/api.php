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


Route::group(['prefix' => 'client'], function (){

    Route::post('/createClient', ['uses' => 'ClientsController@create']);

    Route::post('/createAddress/{client_id}', ['uses' => 'ClientsController@createAddress']);

    Route::get('/clientList', ['uses' => 'ClientsController@index']);

    Route::get('/show/{client_id}', ['uses' => 'ClientsController@show']);

    Route::delete('/destroy/{client_id}', ['uses' => 'ClientsController@destroy']);

    Route::patch('/updateClientAddress/{client_id}', ['uses' => 'ClientsController@updateClientAddress']);

    Route::get('/getAddresses/{client_id}', ['uses' => 'ClientsController@getAddresses']);

});


Route::group(['prefix'=>'company'],function() {

    Route::post('/createCompany', ['uses' => 'CompanyController@create']);

    Route::get('/dashboard', ['uses' => 'CompanyController@index']);

    Route::get('/show/{company_id}', ['uses' => 'CompanyController@show']);

    Route::patch('/updateCompany/{company_id}', ['uses' => 'CompanyController@updateCompany']);

    Route::delete('/destroy/{company_id}', ['uses' => 'CompanyController@destroy']);

    Route::post('/authenticate/{company_id}', ['uses' => 'CompanyController@authenticate']);

});


Route::group(['prefix' => 'company/{user_id}/year'], function (){

    Route::post('/createFinancialYear', ['uses' => 'FinancialYearController@createFinancialYear']);

    Route::get('/dashboard', ['uses' => 'FinancialYearController@index']);

    Route::get('/statementYearWise/{financial_year_id}', ['uses' => 'FinancialYearController@statementYearWise']);

});



Route::group(['prefix'=>'year/{financial_year_id}'],function() {

    Route::post('/createFinancialMonth', ['uses' => 'FinancialMonthController@createFinancialMonth']);

    Route::get('/dashboard', ['uses' => 'FinancialMonthController@index']);

    Route::get('/statementMonthWise/{financial_month_id}', ['uses' => 'FinancialMonthController@statementYearWise']);

});


Route::group(['prefix'=>'user'],function() {

    Route::post('/createUser', ['uses' => 'UsersController@createUser']);

    Route::get('/index', ['uses' => 'UsersController@index']);

    Route::patch('/updateUser/{user_id}', ['uses' => 'UsersController@updateUser']);

    Route::get('/show/{user_id}', ['uses' => 'UsersController@show']);

    Route::delete('/destroy/{user_id}', ['uses' => 'UsersController@destroy']);

});