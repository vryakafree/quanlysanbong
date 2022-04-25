<?php

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $type = App\Models\Type::all();
    return view('dashboard',['type' => $type]);
})->middleware(['auth'])->name('dashboard');

Route::get('/timetable', function () {
    return view('user_stuff/timetable');
})->middleware(['auth'])->name('timetable');

Route::get('getField/{id}', function ($id) {
    $field = App\Models\Field::where('type_id',$id)->get();
    return response()->json($field);
});

Route::get('/dropdown', function () {
    return view('dropdown');
});

Route::resource('fields', 'App\Http\Controllers\FieldsController');

require __DIR__.'/auth.php';
