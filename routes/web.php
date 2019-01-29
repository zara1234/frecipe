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


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.handle');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Home Route
Route::get('/', 'Auth\LoginController@showLoginForm');

// App Route
Route::get('/kitchen', 'KitchenController@index')->name('kitchen.index');
Route::get('/kitchen/fridge', 'FridgeController@index')->name('fridge.index');
Route::get('/kitchen/fridge/add', 'FridgeController@addItem')->name('fridge.addItem');
Route::post('/kitchen/fridge/add', 'FridgeController@postAddItem')->name('fridge.postAddItem');
Route::post('/kitchen/fridge/change', 'FridgeController@postChangeItem')->name('fridge.postChangeItem');


Route::get('/cookbook/', "CookbookController@index")->name("cookbook.index");
Route::get('/cookbook/show/{id}', "CookbookController@show")->name("cookbook.show");
Route::get('/cookbook/filter', "CookbookController@filter")->name("cookbook.filter");


Route::prefix("cp")->middleware("admin.auth")->name("cp.")->group(function() {
    Route::get('/recipe/create', "AdminController@recipeCreate")->name('recipeCreate');
    Route::get('/cookbook/show', "AdminController@cookbookShow")->name('cookbookAdmin');
    Route::get('/cookbook/create', "AdminController@cookbookCreate")->name('cookbookCreate');
    Route::delete('/cookbook/{id}/delete', ['uses' => 'AdminController@destroy', 'as' => 'cookbook.delete']);

});
