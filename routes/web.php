<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('books',  ['uses' => 'BookController@index']);
$router->post('books',  ['uses' => 'BookController@store']);
$router->delete('books/{id}',  ['uses' => 'BookController@destroy']);
$router->patch('books/{id}',  ['uses' => 'BookController@update']);
$router->get('genres',  ['uses' => 'GenreController@index']);

$router->get('calendars',  ['uses' => 'CalendarController@index']);

/*
$router->get('activities',  ['uses' => 'ActivityController@index']);
$router->post('timetables/{category}/{timetable}/activities',  ['uses' => 'ActivityController@store']);
$router->delete('activities/{id}',  ['uses' => 'ActivityController@destroy']);
$router->patch('activities/{id}',  ['uses' => 'ActivityController@update']);

$router->get('category',  ['uses' => 'CategoryController@index']);

$router->get('timetables',  ['uses' => 'TimetableController@index']);
$router->post('timetables',  ['uses' => 'TimetableController@store']);
$router->patch('timetables/{id}',  ['uses' => 'TimetableController@update']);
*/
