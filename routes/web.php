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
$router->get('/', function() {
    return app()->version();
});

$router->post('login',  ['uses' => 'AuthController@login']);
$router->post('users',  ['uses' => 'UsersController@store']);

$router->group(['middleware' => 'client.credentials'], function() use ($router){
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
        $router->get('boards',  ['uses' => 'BoardsController@index']);
        $router->post('boards',  ['uses' => 'BoardsController@store']);
        $router->get('boards/{id}',  ['uses' => 'BoardsController@show']);
        $router->patch('boards/{id}',  ['uses' => 'BoardsController@update']);
        $router->delete('boards/{id}',  ['uses' => 'BoardsController@destroy']);

        $router->get('boards/{board}/statuses',  ['uses' => 'StatusesController@index']);
        $router->patch('boards/{board}/statuses',  ['uses' => 'StatusesController@updateOrderAll']);
        $router->post('boards/{board}/statuses',  ['uses' => 'StatusesController@store']);
        $router->patch('boards/{board}/statuses/{id}',  ['uses' => 'StatusesController@update']);
        $router->delete('boards/{board}/statuses/{id}',  ['uses' => 'StatusesController@destroy']);

        $router->get('statuses/favorites',  ['uses' => 'FavoriteStatusesController@index']);
        $router->post('statuses/{status}/favorite',  ['uses' => 'FavoriteStatusesController@store']);
        $router->delete('statuses/{status}/favorite',  ['uses' => 'FavoriteStatusesController@destroy']);

        $router->get('statuses/{status}/tasks',  ['uses' => 'TasksController@index']);
        $router->post('statuses/{status}/tasks',  ['uses' => 'TasksController@store']);
        $router->patch('statuses/{status}/tasks',  ['uses' => 'TasksController@updateOrderAll']);
        $router->patch('statuses/{status}/tasks/{id}',  ['uses' => 'TasksController@update']);
        $router->delete('statuses/{status}/tasks/{id}',  ['uses' => 'TasksController@destroy']);

        $router->get('tasks/{task}/objectives',  ['uses' => 'TaskObjectivesController@index']);
        $router->post('tasks/{task}/objectives',  ['uses' => 'TaskObjectivesController@store']);
        $router->patch('tasks/{task}/objectives/{id}',  ['uses' => 'TaskObjectivesController@update']);
        $router->delete('tasks/{task}/objectives/{id}',  ['uses' => 'TaskObjectivesController@destroy']);
    });

    /*
     * User Routes
     */
    $router->get('users',  ['uses' => 'UsersController@index']);
    $router->delete('users/{user}',  ['uses' => 'UsersController@destroy']);
    $router->patch('users/{user}',  ['uses' => 'UsersController@update']);

    /*
     * User Credentials
     */
    $router->group(['middleware' => 'auth:api'], function() use ($router){
        $router->get('users/me',  ['uses' => 'UsersController@me']);
    });
});

