<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\DivisionController;

// Route::get('', function(){return view('welcome');});
// Frontend Part ----------------
Route::get('/', [WebController::class, 'index']);
Route::get('/singlePost', [WebController::class, 'single']);

// Backend Part ----------------
Route::get('/dashboard', function(){return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function()
{
    // Users Section -------------------
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Category Section -------------------
    Route::post('/addcat', [CategoryController::class, 'addcat']);
    Route::get('/category', [CategoryController::class, 'add']);
    Route::get('/delete.category/{cat_id}', [CategoryController::class, 'catDelete']);
    Route::get('/edit.category/{cat_id}', [CategoryController::class, 'editCat']);
    Route::post('/update.category/{cat_id}', [CategoryController::class, 'update']);

    // Sub-Category Section -------------------
    Route::post('/addSub-cat', [SubCategoryController::class, 'index']);
    Route::post('/addSub', [SubCategoryController::class, 'create']);
    Route::get('/subCategory', [SubCategoryController::class, 'addSubcat']);
    Route::get('/delete.subCategory/{subcat_id}', [SubCategoryController::class, 'subcatDelete']);
    Route::get('/edit.subCategory/{subcat_id}', [SubCategoryController::class, 'editSubCat']);
    Route::post('/update.subCategory/{subcat_id}', [SubCategoryController::class, 'updateSub']);

    // News Section -------------------
    Route::get('/newsCreate', [NewsController::class, 'index']);
    Route::get('get/subcat/{cat_id}', [NewsController::class, 'getSubCat']);
    Route::post('/store/news', [NewsController::class, 'storeNews']);
    Route::get('/newsView', [NewsController::class, 'showNews']);
    Route::get('/delete/news/{news_id}', [NewsController::class, 'destroyNews']);
    Route::get('/edit.news/{news_id}', [NewsController::class, 'editNews']);
    Route::post('/update/news/{news_id}', [NewsController::class, 'updateNews']);
});
require __DIR__.'/auth.php';
