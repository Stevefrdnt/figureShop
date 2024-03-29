<?php

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

Route::get('/', 'HomeController@index');
Route::get('/Login', function () {
    return view('login');
});
Route::get('/Register', function () {
    return view('register');
});
// ini untuk figure detail
Route::get('/Detail/{id}', 'DetailController@index');

Route::group(['middleware' => ['CheckMember', 'web']], function (){
    Route::get('/Cart', 'CartController@index');
    Route::get('/Cart/RemoveDetail/{id}', 'CartController@destroyDetail');
    Route::post('/addToCart','CartController@store');
    Route::post('/doCheckout/{cartId}','CartController@checkout');


    //untuk memberikan feedback
    Route::get('Feedback', function () {
        return view('feedback');
    });
    Route::POST('Feedback/doInsert', 'FeedbackController@store');

});


Route::group(['middleware' => ['CheckAdmin', 'web']], function (){

    //Figure Routes
    Route::get('Admin/Figure', 'FigureController@index');
    Route::get('Admin/Figure/Insert', 'FigureController@gotoInsert');
    Route::post('Figure/doInsert', 'FigureController@store');
    Route::get('Admin/Figure/Update/{id} ', 'FigureController@edit');
    Route::post('Figure/doUpdate/{id} ', 'FigureController@update');
    Route::get('Figure/doDelete/{id} ', 'FigureController@destroy');

    Route::get('Admin/Category', 'CategoryController@index');
    Route::get('Admin/Category/Insert', function () {
        return view('admin.categoryInsert');
    });
    Route::post('Admin/Category/doInsert', 'CategoryController@store');
    Route::post('Admin/Category/doDelete/{id}', 'CategoryController@destroy');
    Route::get('Admin/Category/Update/{id}', 'CategoryController@updatePage');
    Route::post('Admin/Category/doUpdate/{id}', 'CategoryController@update');

    Route::get('Admin/Feedback', 'FeedbackController@index');
    Route::POST('Admin/Feedback/Approve/{id}', 'FeedbackController@approve');
    Route::POST('Admin/Feedback/Reject/{id}', 'FeedbackController@reject');

    Route::get('Admin/User', 'UserController@indexManageUser');
    Route::get('Admin/User/{id}', 'UserController@indexManageUserUpdate');
    Route::get('Profile/doDelete/{id} ', 'UserController@destroy');
});

Route::group(['middleware' => ['CheckBoth', 'web']], function () {

    Route::get('TransactionHistory', 'TransactionController@index');
    Route::get('Profile', 'UserController@indexProfile');
    Route::get('Profile/Update/{id}', 'UserController@indexUpdateProfile');
    Route::post('Profile/doUpdate/{id}', 'UserController@update');
});

Route::get('/doLogout','AuthController@logout');
Route::post('/doRegister', 'AuthController@store');
Route::post('/doLogin','AuthController@login');
