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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('company','CompaniesController');

Route::resource('user','UsersController');

Route::resource('comment','CommentsController');

Route::resource('project','ProjectsController');

Route::resource('task','TasksController');

Route::resource('projectuser','ProjectUserController');

Route::resource('taskuser','TaskUserController');

Route::get('/thoat', 'HomeController@Thoat')->name('thoat');

Route::get('resizeImage', 'ImageController@resizeImage');
Route::post('resizeImagePost',[
    'as'=>'resizeImagePost',
    'uses'=>'ImageController@resizeImagePost'
    ]);

Route::get('/shop',[
    'as' => 'Product.index',
    'uses' => 'ProductsController@getIndex'
]);

Route::get('congty/tao', 'CompaniesController@createe');
Route::get('project/create','ProjectsController@create');
Route::get('/thoat', 'HomeController@Thoat')->name('thoat');

Route::post('deleteItem', 'ProjectsController@deleteItem');
Route::post('editItem', 'ProjectsController@editItem');
Route::get('project', 'ProjectsController@readItems');

Route::get('resizeImage', 'ImageController@resizeImage');
Route::post('resizeImagePost',['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);

Route::post('/cart', 'CartController@cart');

Route::get('/add-to-cart/{id}',[
    'uses' => 'ProductsController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('shopping-cart',[
    'as'=>'product.shoppingCart',
    'uses'=>'ProductsController@getCart'
]);