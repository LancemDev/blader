<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
// use App\Livewire\SnackRequest;
use App\Livewire\Home;
use App\Livewire\Recommendations;
use App\Livewire\Trending;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MessageController;
use App\Livewire\CreateVideo;
use App\Livewire\ViewVideo;
// use App\Livewire\UploadArea;

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

Route::get('/', Home::class)->middleware(['auth', 'verified'])->name('home');

Route::get('/counter', Counter::class);
Route::post('/message', [MessageController::class, 'sendMessage']);

Route::get('/create-video', CreateVideo::class)->middleware(['auth', 'verified'])->name('create-video');
Route::get('/home', Home::class)->middleware(['auth', 'verified'])->name('home');
Route::get('/dashboard', Home::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/trending', Trending::class)->middleware(['auth', 'verified'])->name('trending');
Route::get('/recommendations', Recommendations::class)->middleware(['auth', 'verified'])->name('recommendations');
Route::post('/video/upload', [VideoController::class, 'store'])->middleware(['auth', 'verified'])->name('video.upload');
// Route::get('/video/{id}', ViewVideo::class)->middleware(['auth', 'verified'])->name('video.show');

// Route::get('/dashboard', Counter::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
