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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','LoadController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/LogIn',function(){
      return view('auth\login');
});

Route::get('singleBlog/{user_id}/{id}','LoadController@singleBlog');

Route::post('storeMail', 'LoadController@handleBlogComment');

// Route::resource('/users','Admin\UserController');

Route::group(array( 'prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'),function(){
    Route::resource('users','UserController');
    // Route::resource('/create','UserController');individualPosts
    Route::get('getAllPosts','ViewPosts@individualPosts');
    Route::get('personalDetails','ViewPosts@personalDetails');
    Route::post('editUser','ViewPosts@updateUser');
});

// This is the route roup for the manager.

Route::group(array('prefix'=> 'manager', 'namespace' => 'Manager', 'middleware' => 'manager'), function(){
    Route::get('dashboard','Dashboard@dashboard');
    Route::get('users','Dashboard@viewAllUsers');
    Route::get('manageCategories','Dashboard@ManageCateories');
    Route::get('/showUpload', 'Dashboard@showUpload');
    Route::post('addCategory','Dashboard@addCategory');
    Route::post('deleteCategory','Dashboard@deleteCategory');
    Route::post('editCategory','Dashboard@editCategory');
    Route::post('uploadImage', 'Dashboard@upload' );
    Route::post('searchUser', 'Dashboard@searchUser' );
});