<?php

    use Illuminate\Http\Request;

    Route::post('/login', ['uses' => 'AuthController@authenticate']);

Route::get('/', ['uses' => 'AuthController@checkAuthentication'])->middleware('jwt');

Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });


Route::group(['prefix' => 'client'], function (){

    Route::post('/createClient/{company_id}', ['uses' => 'ClientsController@create']);

    Route::post('/createAddress/{client_id}', ['uses' => 'ClientsController@createAddress']);

    Route::patch('/updateName/{client_id}', ['uses' => 'ClientsController@updateName']);

    Route::get('/clientList/{company_id}', ['uses' => 'ClientsController@index']);

    Route::get('/show/{client_id}', ['uses' => 'ClientsController@show']);

    Route::delete('/destroy/{client_id}', ['uses' => 'ClientsController@destroy']);

    Route::patch('/updateClientAddress/{client_id}', ['uses' => 'ClientsController@updateClientAddress']);

    Route::get('/getAddresses/{client_id}', ['uses' => 'ClientsController@getAddresses']);

});


Route::group(['prefix'=>'statement'],function() {

    Route::get('/generateStatementPartywiseDebit/{from_date}/{to_date}/{company}/{id}', ['uses' => 'StatementController@generateStatementPartywiseDebit']);

    Route::post('/generateStatementPartywiseBill', ['uses' => 'StatementController@generateStatementPartywiseBill']);

    Route::get('/listOfStatement', ['uses' => 'StatementController@listOfStatement']);

    Route::get('/listOfStatementClientWise', ['uses' => 'StatementController@listOfStatementClientWise']);

    Route::get('/generateStatement/{from_date}/{to_date}/{company}/{id}', ['uses' => 'StatementController@generateStatement']);

});


Route::group(['prefix'=>'company'],function() {

    Route::post('/createCompany', ['uses' => 'CompanyController@create']);

    Route::get('/dashboard', ['uses' => 'CompanyController@index']);

    Route::get('/show/{company_id}', ['uses' => 'CompanyController@show']);

    Route::patch('/updateCompany/{company_id}', ['uses' => 'CompanyController@updateCompany']);

    Route::delete('/destroy/{company_id}', ['uses' => 'CompanyController@destroy']);

    Route::post('/authenticate/{company_id}', ['uses' => 'CompanyController@authenticate']);

    Route::post('/addBank/{company_id}', ['uses' => 'CompanyController@addBank']);

    Route::get('/listOfBanks/{company_id}', ['uses' => 'CompanyController@listOfBanks']);

    Route::delete('/bank/destroy/{bank_id}', ['uses' => 'CompanyController@deleteBank']);

});

// company/dashboard


Route::group(['prefix' => 'company/{company_id}/year'], function (){

    Route::post('/createFinancialYear', ['uses' => 'FinancialYearController@createFinancialYear']);

    Route::get('/dashboard', ['uses' => 'FinancialYearController@index']);

    Route::get('/statementYearWise/{financial_year_id}', ['uses' => 'FinancialYearController@statementYearWise']);

});

//company/{company_id}

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


//Route::patch('/updatePrimary/{bill_no}', ['uses' => 'DebitController@updatePrimary']);

//Route::post('/addDebitDetails/{debit_no}', ['uses' => 'DebitController@addDebitDetails']);

//Route::patch('/editDebitDetails/{debit_no}/{debit_detail_no}', ['uses' => 'DebitController@editDebitDetails']);

//Route::delete('/deleteDebitDetail/{debit_detail_no}', ['uses' => 'DebitController@deleteDebitDetail']);

//Route::get('/getDebitDetails/{debit_no}', ['uses' => 'DebitController@getDebitDetails']);

Route::group(['prefix'=>'company/{company_id}/year/{financial_year}/month/{financial_month}'],function() {

    Route::post('/createNew', ['uses' => 'DebitController@createNew']);

    Route::post('/calculateTotalAmount/{debit_no}', ['uses' => 'DebitController@calculateTotalAmount']);

    Route::post('/confirmBill/{debit_no}', ['uses' => 'DebitController@confirmBill']);

    Route::get('/displayAllData/{debit_no}', ['uses' => 'DebitController@displayAllData']);

    Route::get('/debit_no/{debit_no}', ['uses' => 'DebitController@debit_no']);

    Route::get('/debitList', ['uses' => 'DebitController@debitList']);

    Route::get('/debitListPending', ['uses' => 'DebitController@debitListPending']);

    Route::get('/latestDebitNo', ['uses' => 'DebitController@latestDebitNo']);

    Route::get('/printDebit/{debit_no}', ['uses' => 'DebitController@printDebit']);

    Route::delete('/deleteDebitPrimary/{debit_no}', ['uses' => 'DebitController@deleteDebitPrimary']);



    Route::post('/addDebitDetails/{debit_no}', ['uses' => 'DebitController@addDebitDetails']);

    Route::get('/quantityTotal/{debit_no}','DebitController@quantityTotal');

    Route::get('/amountTotal/{debit_no}','DebitController@amountTotal');

    Route::get('/getDebitDetails/{debit_no}', ['uses' => 'DebitController@getDebitDetails']);

    Route::patch('/updatePrimary/{bill_no}', ['uses' => 'DebitController@updatePrimary']);

    Route::patch('/editDebitDetails/{debit_no}/{debit_detail_no}', ['uses' => 'DebitController@editDebitDetails']);

    Route::delete('/deleteDebitDetail/{debit_detail_no}', ['uses' => 'DebitController@deleteDebitDetail']);



});

Route::group(['prefix'=>'company/{company_id}/year/{financial_year}/month/{financial_month}/bill'],function() {

    Route::post('/createNew', ['uses' => 'BillController@createNew']);

    Route::post('/calculateTotalAmount/{bill_no}', ['uses' => 'BillController@calculateTotalAmount']);

    Route::post('/confirmBill/{bill_no}', ['uses' => 'BillController@confirmBill']);

    Route::get('/displayAllData/{bill_no}', ['uses' => 'BillController@displayAllData']);

    Route::get('/bill_no/{bill_no}', ['uses' => 'BillController@bill_no']);

    Route::get('/billList', ['uses' => 'BillController@billList']);

    Route::get('/billListPending', ['uses' => 'BillController@billListPending']);

    Route::get('/latestBillNo', ['uses' => 'BillController@latestBillNo']);

    Route::get('/printGSTBill/{debit_no}', ['uses' => 'BillController@printGSTBill']);

    Route::delete('/deleteBillPrimary/{bill_no}', ['uses' => 'BillController@deleteBillPrimary']);



    Route::patch('/updatePrimary/{bill_no}', ['uses' => 'BillController@updatePrimary']);

    Route::post('/addBillDetails/{bill_no}', ['uses' => 'BillController@addBillDetails']);

    Route::patch('/editBillDetails/{bill_no}/{bill_detail_no}', ['uses' => 'BillController@editBillDetails']);

    Route::delete('/deleteBillDetail/{bill_detail_no}', ['uses' => 'BillController@deleteBillDetail']);

    Route::get('/getBillDetails/{bill_no}', ['uses' => 'BillController@getBillDetails']);

    Route::get('/quantityTotal/{bill_no}','BillController@quantityTotal');

    Route::get('/amountTotal/{bill_no}','BillController@amountTotal');


});


Route::get('/stateList', ['uses' => 'ShortcutController@stateList']);

Route::get('/shortcut/index', ['uses' => 'ShortcutController@index']);

Route::post('/shortcut/create', ['uses' => 'ShortcutController@create']);

Route::delete('/shortcut/delete/{sid}', ['uses' => 'ShortcutController@delete']);

Route::patch('/shortcut/update/{sid}', ['uses' => 'ShortcutController@update']);


Route::get('pdf','StatementController@pdf');
