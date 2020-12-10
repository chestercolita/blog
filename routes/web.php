<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

Route::get('/sendmail', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/services', [PagesController::class, 'services'])->name('services');

Route::resource('/posts', PostsController::class);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/sendmail', function () {
    Mail::to('newuser@example.com')->send(new App\Mail\MailtrapExample);
    return 'A message has been sent to Mailtrap!';

});
