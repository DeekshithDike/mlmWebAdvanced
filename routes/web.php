<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;

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
    return view('website.welcome');
});

Route::get('/about', function () {
    return view('website.about');
});

// Authenticated & Email verified users routes for all users
Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('dashboard', [CommonController::class, 'index'])->name('dashboard');
});



require __DIR__.'/auth.php';
require __DIR__.'/customer.php';
require __DIR__.'/admin.php';
