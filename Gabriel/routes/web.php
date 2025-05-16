<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
    return view('index');
})->name('home');

Route::get('/skills', function () {
    return view('skills');
})->name('skills');

Route::get('/experiences', function () {
    return view('experiences');
})->name('experiences');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/sitemap.xml', function () {
    $file = public_path('sitemap.xml');

    // if (File::exists($file)) {
    //     return response()->file($file, [
    //         'Content-Type' => 'application/xml',
    //     ]);
    // }

    abort(404);
});

Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');

Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['pt_BR', 'en'])) {
        abort(400); // idioma inválido
    }

    session(['locale' => $locale]);
    app()->setLocale($locale);

    return redirect()->back();
})->name('change.language');
