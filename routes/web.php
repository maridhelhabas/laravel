<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\testFinalController;
use App\Http\Controllers\nameController;
use App\Http\Controllers\ageController;
use App\Http\Controllers\YearVerificationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ontimepayorController;
use App\Http\Controllers\HomeController;
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

Route::get('/bgyif', function () {
    return view('welcome');
})->name('welcome');



Route::get('/name', function () {
    return 'Maridhel Habas';
});
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/gallery', function () {
    return view('gallery');
});

    
Route::get('testing', [testFinalController::class, 'testFunction']);

Route::post('inputName',[nameController::class, 'Name']);
Route::get('inputName',[nameController::class, 'Name']);

Route::post('ageVerifier',[ageController::class, 'showAge']);
Route::get('ageVerifier',[ageController::class, 'showAge']);


Route::get('trylogin',[App\Http\Controllers\YearVerificationController::class, 'yearCheck'])->middleware('check_year');



// Route::get('login2', [loginController::class, 'loginForm'])->name('login');
// Route::post('login2', [loginController::class, 'login'])->middleware('login_form');

Route::get('/dashboard2', function() {
    return view('dashboard');
})->name('habas');


Route::resource('employees', EmployeeController::class);

Route::resource('debtors', ontimepayorController::class);
Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('employees.index');
})->name('dashboard');


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



