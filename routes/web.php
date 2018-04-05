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

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);




Route::group(['middleware'=>'admin'], function() {


    Route::get('admin', 'AdminDashboardController@index');

    // Routes for event settings
    Route::get('/admin/events/settings', ['as'=>'events.settings', 'uses'=>'AdminEventSettingsController@index']);
    Route::delete('/admin/events/settings/delete/category/{id}', ['as' => 'settings.delete.category', 'uses' => 'AdminEventSettingsController@destroyCategory']);
    Route::delete('/admin/events/settings/delete/channel/{id}', ['as' => 'settings.delete.channel', 'uses' => 'AdminEventSettingsController@destroyChannel']);
    Route::post('/admin/events/settings/store/channel', ['as' => 'settings.store.channel', 'uses' => 'AdminEventSettingsController@storeChannel']);
    Route::post('/admin/events/settings/store/category', ['as' => 'settings.store.category', 'uses' => 'AdminEventSettingsController@storeCategory']);

    // Routes for Event product list
    Route::resource('/admin/events/productlist', 'AdminEventProductListController');
    Route::post('/admin/events/productlist/store/product', ['as' => 'events.productlist.store.product', 'uses' => 'AdminEventProductListController@storeProduct']);

    // Routes for sites
    Route::resource('/admin/sites', 'AdminSiteController');

    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/posts','AdminPostsController');

    Route::resource('admin/categories', 'AdminCategoriesController');

    Route::resource('admin/media', 'AdminMediaController');

    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comments/replies', 'CommentRepliesController');

    Route::resource('admin/tasks', 'AdminTaskController');

    Route::resource('admin/events', 'AdminEventController');






});


Route::group(['middleware'=>'auth'], function() {

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});
