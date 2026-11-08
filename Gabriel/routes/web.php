<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/sitemap.xml', function () {
    return response()->view('sitemap', [], 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

foreach (['' => 'home', 'skills' => 'skills', 'experiences' => 'experiences', 'about' => 'about', 'contacts' => 'contacts'] as $path => $name) {
    Route::redirect('/'.$path, '/pt'.($path ? '/'.$path : ''), 301);
}
Route::get('/lang/{locale}', function ($locale) {
    abort_unless(in_array($locale, ['pt_BR', 'pt', 'en']), 404);
    return redirect('/'.($locale === 'en' ? 'en' : 'pt'), 301);
})->name('change.language');
// Preserve the old POST endpoint without redirecting a request body.
Route::post('/send-email', [ContactController::class, 'sendEmail'])->middleware('throttle:5,1');
Route::prefix('{locale}')->where(['locale' => 'pt|en'])->group(function () {
    foreach (['' => 'home', 'skills' => 'skills', 'experiences' => 'experiences', 'about' => 'about', 'contacts' => 'contacts', 'resume' => 'resume'] as $path => $name) {
        Route::view('/'.$path, $name === 'home' ? 'index' : $name)->name($name);
    }
    Route::post('/send-email', [ContactController::class, 'sendEmail'])->middleware('throttle:5,1')->name('send.email');
});
