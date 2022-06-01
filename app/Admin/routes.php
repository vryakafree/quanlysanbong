<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'BookFieldController@index')->name('auth/book-fields');
    $router->resource('auth/users', UserController::class);
    $router->resource('auth/book-fields', BookFieldController::class);
    $router->resource('auth/fields', FieldController::class);
});
