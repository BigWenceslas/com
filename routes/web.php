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

Route::get('/', 'homeController@index');

Route::resource('personnels', 'personnelsController');
Route::resource('equipes', 'equipesController');
Route::resource('instances', 'instancesController');
Route::resource('installations', 'installationsController');
Route::resource('etudes', 'etudesController');
Route::resource('resiliations', 'resiliationsController');

Route::resource('derangements', 'derangementsController');

Route::resource('notes', 'notesController');
