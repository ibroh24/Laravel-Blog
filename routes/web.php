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

use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/test', function(){
    // return App\Post::find(9)->tags;
    // dd(App\Category::find(1)->posts());
    // dd(App\Post::find(1)->category);

    dd(App\Profile::find(1)->users());

});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/post/create', 'PostsController@create')->name('post.create');
    Route::post('/post/store', 'PostsController@store')->name('post.store');
    Route::get('/post/index', 'PostsController@index')->name('post.index');
    Route::get('/post/trashed', 'PostsController@trashed')->name('post.trashed');
    Route::get('/post/kill/{id}', 'PostsController@kill')->name('post.kill');
    Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.destroy');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');

    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
    Route::post('/category/store', 'CategoriesController@store')->name('category.store');
    Route::get('/category/index', 'CategoriesController@index')->name('category.index');
    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.destroy');
    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

    Route::get('/tag/create', 'TagsController@create')->name('tag.create');
    Route::post('/tag/store', 'TagsController@store')->name('tag.store');
    Route::get('/tag/index', 'TagsController@index')->name('tag.index');
    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.destroy');
    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');
    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');
    
    Route::resource('/user', 'UsersController');
    Route::get('/user/delete/{id}', 'UsersController@destroy')->name('user.destroy');
    Route::get('/user/admin/{id}', 'UsersController@admin')->name('user.admin');
    Route::get('/user/nonadmin/{id}', 'UsersController@notAdmin')->name('user.notadm');

    Route::get('/profile', 'ProfilesController@index')->name('profile.index');
    Route::post('/profile/user', 'ProfilesController@update')->name('profile.update');
    
    Route::post('/settings/update', 'SettingsController@update')->name('setting.update')->middleware('admin');
    Route::get('/settings', 'SettingsController@index')->name('setting.index');
});
