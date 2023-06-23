<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\DashboardController;

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

//localhost:8000
Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('projects', ProjectController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //localhost:8000/admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

});

// localhost:8000/admin/----
// localhost:8000/admin/posts
// localhost:8000/admin/posts/{post}
// localhost:8000/admin/posts/create


require __DIR__.'/auth.php';
