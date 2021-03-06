<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    if (Auth::User() != null) {
        return redirect('dashboard');
    }
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $type = App\Models\Type::all();
    return view('dashboard', ['type' => $type]);
})->middleware(['auth'])->name('dashboard');

Route::get('getField/{id}', function ($id) {
    $field = App\Models\Field::where('type_id', $id)->get();
    return response()->json($field);
});

Route::get('/timetable', function () {
    return view('user_stuff/timetable');
})->middleware(['auth'])->name('timetable');

Route::resource('fields', 'App\Http\Controllers\FieldsController');
Route::resource('bookfields', 'App\Http\Controllers\BookFieldsController');

Route::get('change-password', 'App\Http\Controllers\ChangePasswordController@index');
Route::post('change-password', 'App\Http\Controllers\ChangePasswordController@store')->name('change.password');

Route::get('change-info', 'App\Http\Controllers\ChangeInfoController@index');
Route::post('change-info', 'App\Http\Controllers\ChangeInfoController@store')->name('change.info');
require __DIR__ . '/auth.php';
