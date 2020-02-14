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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'role:admin'], function() {
    //Roles
    Route::get('/roles', 'Admin\RoleController@index')->name('admin.roles.index');
    Route::put('role/{id}', 'Admin\RoleController@update')->name('admin.roles.update');
    Route::post('/roles', 'Admin\RoleController@store')->name('admin.roles.store');
    Route::get('/role/{id}/edit', 'Admin\RoleController@edit')->name('admin.roles.edit');
    Route::get('/add-role', 'Admin\RoleController@create')->name('admin.roles.create');
    Route::delete('/role/{id}', 'Admin\RoleController@destroy')->name('admin.roles.destroy');

    //Permissions
    Route::get('/permissions', 'Admin\PermissionController@index')->name('admin.permissions.index');
    Route::put('permission/{id}', 'Admin\PermissionController@update')->name('admin.permissions.update');
    Route::post('/permissions', 'Admin\PermissionController@store')->name('admin.permissions.store');
    Route::get('/permission/{id}/edit', 'Admin\PermissionController@edit')->name('admin.permissions.edit');
    Route::get('/add-permission', 'Admin\PermissionController@create')->name('admin.permissions.create');
    Route::delete('/permission/{id}', 'Admin\PermissionController@destroy')->name('admin.permissions.destroy');

    //Categories
    Route::get('/category', 'Admin\CategoryController@index')->name('admin.nom.category.index');
    Route::put('category/{id}', 'Admin\CategoryController@update')->name('admin.nom.category.update');
    Route::post('/category', 'Admin\CategoryController@store')->name('admin.nom.category.store');
    Route::get('/category/{id}/edit', 'Admin\CategoryController@edit')->name('admin.nom.category.edit');
    Route::get('/category/{id}', 'Admin\CategoryController@show')->name('admin.nom.category.show');
    Route::get('/add-category', 'Admin\CategoryController@create')->name('admin.nom.category.create');
    Route::delete('/category/{id}', 'Admin\CategoryController@destroy')->name('admin.nom.category.destroy');

    //Priorities
    Route::get('/priority', 'Admin\PriorityController@index')->name('admin.nom.priority.index');
    Route::put('priority/{id}', 'Admin\PriorityController@update')->name('admin.nom.priority.update');
    Route::post('/priority', 'Admin\PriorityController@store')->name('admin.nom.priority.store');
    Route::get('/priority/{id}/edit', 'Admin\PriorityController@edit')->name('admin.nom.priority.edit');
    Route::get('/priority/{id}', 'Admin\PriorityController@show')->name('admin.nom.priority.show');
    Route::get('/add-priority', 'Admin\PriorityController@create')->name('admin.nom.priority.create');
    Route::delete('/priority/{id}', 'Admin\PriorityController@destroy')->name('admin.nom.priority.destroy');

    //Statuses
    Route::get('/status', 'Admin\StatusController@index')->name('admin.nom.status.index');
    Route::put('status/{id}', 'Admin\StatusController@update')->name('admin.nom.status.update');
    Route::post('/status', 'Admin\StatusController@store')->name('admin.nom.status.store');
    Route::get('/status/{id}/edit', 'Admin\StatusController@edit')->name('admin.nom.status.edit');
    Route::get('/status/{id}', 'Admin\StatusController@show')->name('admin.nom.status.show');
    Route::get('/add-status', 'Admin\StatusController@create')->name('admin.nom.status.create');
    Route::delete('/status/{id}', 'Admin\StatusController@destroy')->name('admin.nom.status.destroy');

    //Types
    Route::get('/type', 'Admin\TypeController@index')->name('admin.nom.type.index');
    Route::put('type/{id}', 'Admin\TypeController@update')->name('admin.nom.type.update');
    Route::post('/type', 'Admin\TypeController@store')->name('admin.nom.type.store');
    Route::get('/type/{id}/edit', 'Admin\TypeController@edit')->name('admin.nom.type.edit');
    Route::get('/type/{id}', 'Admin\TypeController@show')->name('admin.nom.type.show');
    Route::get('/add-type', 'Admin\TypeController@create')->name('admin.nom.type.create');
    Route::delete('/type/{id}', 'Admin\TypeController@destroy')->name('admin.nom.type.destroy');

    //Tickets
    Route::get('/tickets', 'Tickets\TicketController@index')->name('admin.ticket.index');
    Route::get('/ticket/{id}', 'Tickets\TicketController@show')->name('admin.ticket.show');
    Route::post('close_ticket/{id}', 'Tickets\TicketController@close')->name('admin.close.ticket');
    Route::delete('/ticket/{id}', 'Tickets\TicketController@destroy')->name('admin.ticket.destroy');

    //Users
    Route::get('/users', 'Admin\UsersController@index')->name('admin.users.index');
    Route::get('/user/{id}/edit', 'Admin\UsersController@edit')->name('admin.users.edit');
    Route::put('user/{id}', 'Admin\UsersController@update')->name('admin.users.update');
    Route::get('/user/{id}', 'Admin\UsersController@show')->name('admin.users.show');
    Route::delete('/user/{id}', 'Admin\UsersController@destroy')->name('admin.users.destroy');
});

Route::group(['middleware' => 'role:normal_user'], function() {
    Route::get('/mytickets', 'Tickets\TicketController@userTickets')->name('users.ticket.index');
    Route::get('/open-ticket', 'Tickets\TicketController@create')->name('users.ticket.create');
    Route::post('/mytickets', 'Tickets\TicketController@store')->name('users.ticket.store');
    Route::get('/mytickets/{id}', 'Tickets\TicketController@showUserTicket')->name('users.ticket.show');
});

//Comments for Ticket
Route::post('/comment', 'Tickets\CommentController@postComment')->name('ticket.comment');
