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
    Route::get('/cookbook/show', "CookbookController@backend_cookbookShow")->name('cookbookAdmin');
    Route::get('/cookbook/create', "CookbookController@backend_cookbookCreate")->name('cookbookCreate');
    Route::get('/cookbook/edit/{id}', "CookbookController@backend_cookbookEdit")->name('cookbookEdit');
    Route::post('/cookbook/edit/{id}', "CookbookController@backend_cookbookEditPost")->name('cookbookEditPost');
    Route::get('/cookbook/edit/{id}/change/{itemId}', "CookbookController@backend_cookbookEditChangeItem")->name('cookbookEdit.changeItem');
    Route::get('/cookbook/edit/{id}/add', 'CookbookController@backend_AddItem')->name('cookbook.addItem');
    Route::post('/cookbook/edit/{id}/add', 'CookbookController@backend_postAddItem')->name('cookbook.postAddItem');
    Route::post('/cookbook/edit/{id}/change', 'CookbookController@backend_postChangeItem')->name('cookbook.postChangeItem');
    Route::delete('/cookbook/{id}/delete', ['uses' => 'CookbookController@backend_destroy', 'as' => 'cookbook.delete']);
//    Route::get('/cookbook/createCookbook',['uses'=>'CookbookController@create','as'=>'cookbook.create']);
    Route::post('/cookbook/store',['uses'=>'CookbookController@store','as'=>'cookbook.store']);
    Route::get('/grocery/show', "GroceryController@backend_groceryShow")->name('groceryShow');
    Route::get('/grocery/create', "GroceryController@backend_groceryCreate")->name('groceryCreate');
    Route::post('/grocery/store',['uses'=>'GroceryController@store','as'=>'grocery.store']);
    Route::get('/grocery/edit/{id}', "GroceryController@backend_groceryEdit")->name('groceryEdit');
    Route::post('/grocery/edit/{id}', "GroceryController@backend_groceryEditPost")->name('groceryEditPost');


});
