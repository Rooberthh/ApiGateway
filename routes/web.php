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

/*
    BookService
*/
$router->get('books',  ['uses' => 'BookController@index']);
$router->post('books',  ['uses' => 'BookController@store']);
$router->delete('books/{id}',  ['uses' => 'BookController@destroy']);
$router->patch('books/{id}',  ['uses' => 'BookController@update']);
$router->get('genres',  ['uses' => 'GenreController@index']);

/*
    CalendarService
*/
$router->get('events',  ['uses' => 'CalendarController@index']);
$router->post('events',  ['uses' => 'CalendarController@store']);
$router->delete('events/{id}',  ['uses' => 'CalendarController@destroy']);
$router->patch('events/{id}',  ['uses' => 'CalendarController@update']);
$router->get('events/frequent',  ['uses' => 'FrequentEventsController@index']);

/*
    TaskService
*/
$router->get('tasks',  ['uses' => 'TasksController@index']);
$router->post('tasks',  ['uses' => 'TasksController@store']);
$router->patch('tasks/{id}',  ['uses' => 'TasksController@update']);
