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

Route::get('/', 'Front\FrontController@index');
Route::get('/{lan}/', 'Front\FrontController@index');
Route::get('/{lan}/front/company/{companyId}', 'Front\FrontController@company');
Route::get('/{lan}/front/company/{companyId}/product', 'Front\FrontController@product');
Route::post('/front/contact', 'Front\FrontController@contact');
Route::post('/api/contact', 'Front\FrontController@contact');

Route::get('/mail-test', 'Front\FrontController@mailTest');
Route::get('/mmc-test', 'Front\FrontController@mmcTest');
Route::post('/mmc-test', 'Front\FrontController@mmcProccess');
Route::get('/csrf-show', function() {
    return view('csrfShow');
});

Route::group(['prefix' => 'admin', 'middleware' => ['check.admin']], function() {

    Route::get('login', 'Admin\UserController@loginPage');
    Route::post('login', 'Admin\UserController@login');

    Route::get('home', 'Admin\UserController@home');
    Route::get('/', 'Admin\UserController@home');
    Route::get('setting', 'Admin\UserController@passAdmin');
    Route::post('setting', 'Admin\UserController@passUpdate');
    Route::get('logout', 'Admin\UserController@logout');

    Route::get('company', 'Admin\CompanyController@index');
    Route::get('company/create', 'Admin\CompanyController@createPage');
    Route::post('company/create', 'Admin\CompanyController@create');
    Route::get('company/edit/{id}', 'Admin\CompanyController@edit');
    Route::post('company/edit/{id}', 'Admin\CompanyController@update');
    Route::get('company/remove/{id}', 'Admin\CompanyController@remove');
    Route::get('company/remove/{id}/info-pic/{infoId}', 'Admin\CompanyController@removeCompanyInfo');

    Route::get('contact', 'Admin\ContactController@index');
    Route::get('contact/edit/{id}', 'Admin\ContactController@edit');
    Route::post('contact/update/{id}', 'Admin\ContactController@update');
});

Route::group(['prefix' => 'company', 'middleware' => ['check.company']], function() {

    Route::get('login', 'Company\UserController@loginPage');
    Route::post('login', 'Company\UserController@login');
    Route::get('home', 'Company\UserController@home');
    Route::get('/', 'Company\UserController@index');
    Route::get('setting', 'Company\UserController@passAdmin');
    Route::post('setting', 'Company\UserController@passUpdate');
    Route::get('logout', 'Company\UserController@logout');

    Route::get('edit', 'Company\UserController@edit');
    Route::post('edit', 'Company\UserController@update');
    Route::get('remove/info-pic/{infoId}', 'Company\UserController@removeCompanyInfo');

    Route::get('product', 'Company\ProductController@index');
    Route::get('product/create', 'Company\ProductController@createPage');
    Route::post('product/create', 'Company\ProductController@create');
    Route::get('product/edit/{id}', 'Company\ProductController@edit');
    Route::post('product/update/{id}', 'Company\ProductController@update');
    Route::get('product/remove/{id}', 'Company\ProductController@remove');
    Route::get('contact', 'Company\ContactController@index');
    Route::get('contact/edit/{id}', 'Company\ContactController@edit');
    Route::post('contact/update/{id}', 'Company\ContactController@update');
});

Route::group(['prefix' => 'company'], function() {
    Route::get('forget', 'Company\UserController@forgetPage');
    Route::post('forget', 'Company\UserController@forget');
});
