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

Route::get('/admin','AdminController@index');
Route::get('/admin/blog','AdminController@blog');
Route::get('/admin/blog/add','AdminController@blog_add');
Route::get('/admin/blog/edit/{id}','AdminController@blog_ed');
Route::post('/admin/blog/edit/blog/update/{id}','AdminController@blog_update');
Route::post('/admin/blog/add/blog_submit','AdminController@blog_submit');
Route::get('/admin/blog/view/{id}','AdminController@blog_view');
Route::get('/admin/blog/del/{id}','AdminController@blog_del');
Route::get('/admin/login','AdminController@login');
Route::post('/admin/logn','AdminController@logn');
Route::get('/admin/logo','AdminController@logo');
Route::get('/admin/notes','AdminController@notes');
Route::get('/admin/notes/add_title','AdminController@notes_title_add');
Route::post('/admin/notes/title/add','AdminController@notes_add_title');
Route::get('/admin/notes/view/{id}','AdminController@notes_view');
Route::get('/admin/notes/add/{id}','AdminController@notes_add');	
Route::post('/admin/notes/add/submit','AdminController@notes_submit');
Route::get('/admin/notes/note_ed/{id}','AdminController@note_edit');
Route::post('/admin/notes/note_ed/update/{id}','AdminController@note_update');
Route::get('/admin/notes/note_del/{id}','AdminController@note_delete');
Route::get('/admin/notes/note_view/{id}','AdminController@note_view');
Route::get('/admin/test','AdminController@test');
Route::get('/admin/test/add_title','AdminController@test_add_title');
Route::post('/admin/test/title/add','AdminController@test_title_added');
Route::get('/admin/test/view/{id}','AdminController@ques_view');
Route::get('/admin/test/add/{id}','AdminController@ques_add');
Route::post('/admin/test/add/submit','AdminController@ques_submit');
Route::get('/admin/test/ques/del/{id}','AdminController@ques_del');
Route::get('/admin/feed','AdminController@feed');






Route::get('/','pages@index');
Route::get('/notes','pages@notes');
Route::get('/prac','pages@prac');
Route::get('/blog','pages@blog');
Route::post('/feedback','pages@feed');
Route::get('/test/view/{id}','pages@test_view');
Route::get('/blog/view/{id}','pages@blog_view');
Route::get('/notes/view/{id}','pages@notes_view');
Route::get('/note/view/{id}','pages@note_view');



Route::get('/log', function () {
    return view('login');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/reg', function () {
    return view('register');
});

