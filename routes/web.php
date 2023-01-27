<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', [HomepageController::class, 'index'])
    ->name('home-page');

Route::resource('transactions', TransactionController::class)
    ->only('create', 'store');

Route::get('/success-submission', function(\Illuminate\Http\Request $request) {
    return view('pages/success-submission');
})
    ->name('success-submission');
