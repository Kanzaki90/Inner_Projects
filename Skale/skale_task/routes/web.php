<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// UsersController
Route::get('/get_users', 'UsersController@get_users');

Route::get('/get_user/{u_id}', 'UsersController@get_user_by_id');



// AccountController
Route::get('/get_accounts/{u_id}', 'AccountController@get_account_by_user_id');

Route::get('/create_account/{email}', 'AccountController@create_account');

Route::get('/deactivate_account/{accountId}', 'AccountController@deactivate_account');

Route::get('/activate_account/{accountId}', 'AccountController@activate_account');

Route::get('/delete_account/{accountId}', 'AccountController@delete_account');



// TransactionsController
Route::get('/get_transactions_by_user_id/{u_id}', 'TransactionsController@get_transactions_by_user_id');

Route::get('/get_transactions_by_account_id/{a_id}', 'TransactionsController@get_transactions_by_account_id');