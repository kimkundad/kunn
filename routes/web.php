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

Route::post('/api/add_contact', 'HomeController@add_contact')->name('add_contact');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/gallery_detail/{id}', 'HomeController@gallery_detail')->name('gallery_detail');

Route::get('/thx_you', 'HomeController@thx_you')->name('thx_you');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/policy', 'HomeController@policy')->name('policy');

Route::get('/events', 'HomeController@events')->name('events');

Route::get('/events/{id}', 'HomeController@events_id')->name('events_id');
Route::get('/api/regis_event/{id}', 'HomeController@regis_event')->name('regis_event');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/blog', 'HomeController@blog');

Route::get('/blog_detail/{id}', 'HomeController@blog_detail');

Route::post('/add_data_user', 'HomeController@add_data_user')->name('add_data_user');

Route::get('/contact', function () {
    return view('contact');
});

Route::group(['middleware' => ['UserRole:manager|employee|customer']], function() {

});

Route::group(['middleware' => ['UserRole:manager|employee']], function() {

    Route::get('admin/dashboard', 'DashboardController@index');
 
    Route::resource('admin/folder', 'FolderController');
    Route::resource('admin/events', 'EventsController');
    Route::post('api/folder_status', 'FolderController@folder_status')->name('folder_status');
    Route::post('admin/add_my_gallery/{id}', 'FolderController@add_my_gallery')->name('add_my_gallery');

    Route::get('admin/my_gallery_f/{id}', 'FolderController@my_gallery_f')->name('my_gallery_f');
    Route::get('api/del_folder/{id}', 'FolderController@del_folder')->name('del_folder');
    Route::get('api/del_image_ff/{id}', 'FolderController@del_image_ff')->name('del_image_ff');

    Route::get('admin/pics', 'BanController@index')->name('index');
    Route::post('/admin/add_my_banner', 'BanController@add_my_banner')->name('add_my_banner');
    Route::get('api/del_image_banner/{id}', 'BanController@del_image_banner')->name('del_image_banner');

    Route::post('/api/events_upload_img', 'EventsController@upload_img')->name('home');
    Route::get('api/del_events/{id}', 'EventsController@del_events')->name('del_events');
    Route::post('api/events_status', 'EventsController@events_status')->name('events_status');
    Route::post('api/getuser_status', 'EventsController@getuser_status')->name('getuser_status');
    Route::get('admin/random_user5/{id}', 'EventsController@random_user5')->name('random_user5');
    Route::get('admin/random_user10/{id}', 'EventsController@random_user10')->name('random_user10');
    Route::get('admin/report_event/{id}', 'EventsController@report_event')->name('report_event');

    Route::get('api/del_user_event_ans/{id}', 'EventsController@del_user_event_ans')->name('del_user_event_ans');


    Route::get('admin/get_user_event/{id}', 'EventsController@get_user_event')->name('get_user_event');

    Route::get('admin/example', 'ExampleController@index')->name('index');
    Route::get('admin/example/create', 'ExampleController@create')->name('create');
    Route::post('api/add_example/', 'ExampleController@add_example')->name('add_example');
    Route::get('admin/example/{id}/show', 'ExampleController@show')->name('show');
    Route::get('admin/edit_example/{id}/edit', 'ExampleController@edit')->name('edit');
    Route::post('api/post_edit_example/{id}', 'ExampleController@post_edit_example')->name('post_edit_example');
    Route::get('del/example/{id}', 'ExampleController@del_example')->name('del_example');
    Route::post('admin/add_question', 'ExampleController@add_question')->name('add_question');
    Route::post('admin/add_question2', 'ExampleController@add_question2')->name('add_question2');
    Route::post('admin/updatesort/{id}', 'ExampleController@updatesort')->name('updatesort');

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

    Route::get('admin/get_file/{id}', 'EventsController@get_file');
    Route::resource('admin/review', 'ReviewController');
    Route::post('api/post_status_review', 'ReviewController@post_status_review');
    Route::get('api/del_review/{id}', 'ReviewController@del_review')->name('del_review');

});