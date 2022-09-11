<?php

use App\Http\Controllers\EmployeeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/employee', function () {
//     return view('employee.index');
// });

// Route:: get('/employee/create', [EmployeeController::class, 'create']);
Route::resource('employee', EmployeeController::class)->middleware('auth');

// para autenticar user se pasa el middleware
// Route::resource('employee', EmployeeController::class)->middleware('auth');

// //se elimina si no esta autenticado
// Auth::routes(['register'=> false, 'reset'=> false]);

Route::get('/home', [EmployeeController::class, 'index'])->name('home');
// Auth::routes();
Auth::routes(['register'=> false, 'reset'=> false]);


Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [EmployeeController::class, 'index'])->name('home');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
