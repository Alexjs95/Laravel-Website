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

Route::get('/', 'PagesController@indexPage');

Route::get('/about', 'PagesController@aboutPage');

Route::get('/services', 'PagesController@servicesPage');

Route::resource('topics', 'TopicController'); // Routes to all functions available in the topic controller

Route::get('topicposts/create/{topic_id}', 'TopicPostController@create');
Route::resource('topicpost', 'TopicPostController', ['except' => ['create']]);

