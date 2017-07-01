<?php

    use Illuminate\Http\Request;

    Route::post('/login', ['uses' => 'AuthController@authenticate']);

Route::get('/', ['uses' => 'AuthController@checkAuthentication'])->middleware('jwt');

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


Route::group(['prefix' => 'company/{company_id}/year'], function (){

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

Route::group(['prefix'=>'company/{company_id}/year/{financial_year}/month/{financial_month}'],function() {

    Route::post('/createNew', ['uses' => 'DebitController@createNew']);

    Route::patch('/updatePrimary', ['uses' => 'DebitController@updatePrimary']);

    Route::post('/addDebitDetails/{debit_no}', ['uses' => 'DebitController@addDebitDetails']);

    Route::patch('/editDebitDetails/{debit_no}/{debit_detail_no}', ['uses' => 'DebitController@editDebitDetails']);

    Route::delete('/deleteDebitDetail/{debit_no}/{debit_detail_no}', ['uses' => 'DebitController@deleteDebitDetail']);

    Route::post('/calculateTotalAmount/{debit_no}', ['uses' => 'DebitController@calculateTotalAmount']);

    Route::post('/confirmBill/{debit_no}', ['uses' => 'DebitController@confirmBill']);

    Route::get('/displayAllData/{debit_no}', ['uses' => 'DebitController@displayAllData']);

    Route::get('/debit_no/{debit_no}', ['uses' => 'DebitController@debit_no']);

    Route::get('/debitList', ['uses' => 'DebitController@debitList']);

});


Route::group(['prefix'=>'company/{company_id}/year/{financial_year}/month/{financial_month}/bill'],function() {

    Route::post('/createNew', ['uses' => 'BillController@createNew']);

    Route::patch('/updatePrimary', ['uses' => 'BillController@updatePrimary']);

    Route::post('/addBillDetails/{bill_no}', ['uses' => 'BillController@addBillDetails']);

    Route::patch('/editBillDetails/{bill_no}/{bill_detail_no}', ['uses' => 'BillController@editBillDetails']);

    Route::delete('/deleteBillDetail/{bill_no}/{debit_detail_no}', ['uses' => 'BillController@deleteBillDetail']);

    Route::post('/calculateTotalAmount/{bill_no}', ['uses' => 'BillController@calculateTotalAmount']);

    Route::post('/confirmBill/{bill_no}', ['uses' => 'BillController@confirmBill']);

    Route::get('/displayAllData/{bill_no}', ['uses' => 'BillController@displayAllData']);

    Route::get('/bill_no/{bill_no}', ['uses' => 'BillController@bill_no']);

    Route::get('/billList', ['uses' => 'BillController@billList']);

});


Route::get('/stateList', ['uses' => 'ShortcutController@stateList']);

