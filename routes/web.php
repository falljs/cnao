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

Route::get('/articles-de-blog', function () {
    return view('blogs');
})->name("articles");

Route::fallback(function () {
    return view('errors.404'); // ta page 404 personnalisée
});

Route::get('/readaptactu-bulletins-dinformations-du-cnao', function () {
    return view('redActu');
})->name("readaptactu");

Route::get('/presentation-et-organisation-du-cnao', function () {
    return view('organisation');
})->name("org");

Route::get('/services/{service}', [FrontendController::class, 'show'])
    ->name('services.show');

Route::get('/articles/{blog}', [FrontendController::class, 'showArticle'])
    ->name('blog.show');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");
