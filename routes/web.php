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
//Route::get('/edit/{id}','TopicController@update');
Route::post('/comments/{topic}','CommentController@store')->name('comments.store');
Route::post('/comment/{topic}','CommentController@storeDeux')->name('comment.store');
Route::get('/loadmessage','CommentController@indexx');
Route::get('/topics/response/{id}','CommentController@showResponse');
Route::get('/topics/message','CommentController@index');
Route::get('/likes/{id}','CommentController@likes');
//codeur gobi abyssinie
Route::get('/profile','ProfileController@profile');
Route::post('/profile','ProfileController@update');
Route::get('topics/show/{id}','TopicController@showTopic')->name('topic');
Route::post('/edit/{id}','TopicController@update');
Route::get('topics/editer/{id}','TopicController@shows');
Route::get('/logout','TopicController@logout')->name('logout');
Route::get('/inbox','TopicController@index')->name('inbox')->middleware('auth');
Route::get('/create','TopicController@create');
Route::get('/editer','TopicController@edit');
Route::post('/topics/store','TopicController@store');
Route::get('/topics/show','TopicController@show');
Route::get('/editer/{id}','TopicController@edit');
Route::get('/inbox/{topic}','TopicController@destroy');

Route::get('/', function () {
    return view('/auth/login');
});
Route::get('/useradmin','TopicController@showuser');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
