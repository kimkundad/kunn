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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/events', 'HomeController@events')->name('events');

Route::get('/events/{id}', 'HomeController@events_id')->name('events_id');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/blog', 'HomeController@blog');

Route::get('/contact', function () {
    return view('contact');
});

Route::group(['middleware' => ['UserRole:manager|employee|customer']], function() {

});

Route::group(['middleware' => ['UserRole:manager|employee']], function() {

    Route::get('admin/dashboard', 'DashboardController@index');

    Route::resource('admin/events', 'EventsController');
    Route::post('/api/events_upload_img', 'EventsController@upload_img')->name('home');
    Route::get('api/del_events/{id}', 'EventsController@del_events')->name('del_events');
    Route::post('api/events_status', 'EventsController@events_status')->name('events_status');

    Route::get('admin/example', 'ExampleController@index')->name('index');
    Route::get('admin/example/create', 'ExampleController@create')->name('create');
    Route::post('api/add_example/', 'ExampleController@add_example')->name('add_example');
    Route::get('admin/example/{id}/show', 'ExampleController@show')->name('show');
    Route::get('admin/edit_example/{id}/edit', 'ExampleController@edit')->name('edit');
    Route::post('api/post_edit_example/{id}', 'ExampleController@post_edit_example')->name('post_edit_example');
    Route::get('del/example/{id}', 'ExampleController@del_example')->name('del_example');
    Route::post('admin/add_question', 'ExampleController@add_question')->name('add_question');
    Route::post('admin/add_question2', 'ExampleController@add_question2')->name('add_question2');
    

    Route::resource('admin/blog', 'BlogController');
    Route::post('/api/upload_img', 'BlogController@upload_img')->name('home');
    Route::get('api/del_blog/{id}', 'BlogController@del_blog')->name('del_blog');

    Route::get('admin/index_b', 'BlogController@blog_index');
    
    Route::post('api/blog_status', 'BlogController@blog_status')->name('blog_status');

    Route::resource('admin/slide_show', 'SlideController');
    Route::post('api/slide_status', 'SlideController@slide_status')->name('slide_status');
    Route::get('api/del_slide/{id}', 'SlideController@del_slide')->name('del_slide');

    Route::get('admin/setting', 'SettingController@setting')->name('setting');
    Route::post('api/post_setting', 'SettingController@post_setting')->name('post_setting');

});