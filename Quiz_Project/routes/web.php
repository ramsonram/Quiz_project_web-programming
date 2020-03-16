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
//      return view('welcome');
// });
Route::get('/', 'welcome@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questionnaire', 'QuestionnaireController');
//Route::resource('question', 'QuestionnaireController');
// Route::get('/questionnaire/{id}/edit', 'QuestionnaireController@edit');
//รับ ค่า title_id
Route::get('/questionnaires/{title_name}', 'QuestionnaireController@shows');
Route::delete('home/{questionnaire}/destroy', 'QuestionnaireController@destroy');


Route::get('/question/{title_id}/create', 'QuestionController@create');
Route::get('/question/{id}/edit', 'QuestionController@edit');
Route::post('/question/{id}/update', 'QuestionController@update');
Route::post('question/{questions}/stores', 'QuestionController@store');

Route::delete('question/{questionnaire}/destroy/{question}', 'QuestionController@destroy');

Route::get('/quiz/{questionnaire}-{slug}', 'SurveyController@show');
// //Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');

Route::get('/checked', 'CheckController@check');
Route::post('/quiz/{questionnaire}-{slug}', 'CheckController@show');

Route::get('/question/{title_id}/create2', 'QuestionController@create');
Route::post('question/{questions}/stores', 'QuestionController@store');

Route::post('news/post', 'PostController@store');
Route::get('post/delete/{post_id}', 'PostController@delete');


