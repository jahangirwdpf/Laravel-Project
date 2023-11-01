<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;

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

Route::get('', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [WebController::class, 'index']);
Route::get('/main', [AdminController::class, 'main']);
Route::get('/reporterAdd', [UserController::class, 'index']);
Route::get('/reporterView', [UserController::class, 'view']);
Route::get('/newsAdd', [UserController::class, 'newsAdd']);
Route::get('/newsView', [UserController::class, 'newsView']);
Route::get('/categoryView', [CategoryController::class, 'index']);
Route::post('/addcat', [CategoryController::class, 'addcat']);

require __DIR__.'/auth.php';
