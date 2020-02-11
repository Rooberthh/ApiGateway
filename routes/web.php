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
$router->get('events/top',  ['uses' => 'TopEventsController@index']);

/*
    TaskService
*/
$router->group(['namespace' => 'TaskService'], function() use ($router)
{
    $router->get('tasks',  ['uses' => 'TasksController@index']);
    $router->post('tasks',  ['uses' => 'TasksController@store']);
    $router->patch('tasks/{id}',  ['uses' => 'TasksController@update']);
    $router->delete('tasks/{id}',  ['uses' => 'TasksController@destroy']);

    $router->get('boards',  ['uses' => 'BoardsController@index']);
    $router->post('boards',  ['uses' => 'BoardsController@store']);
    $router->patch('boards/{id}',  ['uses' => 'BoardsController@update']);
    $router->delete('boards/{id}',  ['uses' => 'BoardsController@destroy']);

    $router->get('boards/{board}/statuses',  ['uses' => 'StatusesController@index']);
    $router->post('boards/{board}/statuses',  ['uses' => 'StatusesController@store']);
    $router->patch('boards/{board}/statuses/{id}',  ['uses' => 'StatusesController@update']);
    $router->delete('boards/{board}/statuses/{id}',  ['uses' => 'StatusesController@destroy']);

    $router->get('tasks/{task}/objectives',  ['uses' => 'TaskObjectivesController@index']);
    $router->post('tasks/{task}/objectives',  ['uses' => 'TaskObjectivesController@store']);
    $router->patch('tasks/{task}/objectives/{objective}',  ['uses' => 'TaskObjectivesController@update']);
    $router->delete('tasks/{task}/objectives/{objective}',  ['uses' => 'TaskObjectivesController@destroy']);
});
    /*
$router->get('tasks',  ['uses' => 'TasksController@index']);
$router->post('tasks',  ['uses' => 'TasksController@store']);
$router->patch('tasks/{id}',  ['uses' => 'TasksController@update']);
$router->delete('tasks/{id}',  ['uses' => 'TasksController@destroy']);

$router->get('statuses',  ['uses' => 'StatusesController@index']);
$router->post('statuses',  ['uses' => 'StatusesController@store']);
$router->patch('statuses/{id}',  ['uses' => 'StatusesController@update']);
$router->delete('statuses/{id}',  ['uses' => 'StatusesController@destroy']);

$router->get('tasks/{task}/objectives',  ['uses' => 'TaskObjectivesController@index']);
$router->post('tasks/{task}/objectives',  ['uses' => 'TaskObjectivesController@store']);
$router->patch('tasks/{task}/objectives/{objective}',  ['uses' => 'TaskObjectivesController@update']);
$router->delete('tasks/{task}/objectives/{objective}',  ['uses' => 'TaskObjectivesController@destroy']);
    */

