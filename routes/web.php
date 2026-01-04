<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/a-propos', function () {
    return view('about');
})->name("about");

Route::get('/presentation-et-organisation-du-cnao', function () {
    return view('organisation');
})->name("org");

Route::get('/services/{service}', [FrontendController::class, 'show'])
    ->name('services.show');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");
