<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\guest\ProductguestController;
use App\Http\Controllers\client\ProductClientController;
use App\Http\Controllers\MailController;
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

//Guest-----------------------------------------------------------------------------------------------------

Route::middleware([])->group(function () {
    Route::get('/', function () {
        return view('guest.home');
    });

    Route::get('/product', [ProductguestController::class, 'index'])->name('guest.product.index');
    Route::get('/guest/product/{id}', [ProductguestController::class, 'show'])->name('guest.product.show');
    Route::get('/guest/product/{id}/cart', [ProductguestController::class, 'cart'])->name('guest.product.cart');
    Route::get('/category/{id}', [ProductguestController::class, 'category'])->name('guest.category');
    Route::get('/search', [ProductguestController::class, 'search'])->name('guest.product.search');
    Route::get('/filter', [ProductguestController::class, 'filter'])->name('guest.product.filter');
    Route::get('/shopping', [ProductguestController::class, 'shopping'])->name('guest.product.shopping');
});



// ------------------------------------------------------------------------------------------------------------------






//Client-------------------------------------------------------------------------------------------------
Route::get('/client/home', function () {
    return view('client.home');
})->name('client.index');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/product/index', [ProductClientController::class, 'index'])->name('client.product.index');
    Route::get('/product/show/{id}', [ProductClientController::class, 'show'])->name('client.product.show');
    Route::get('/product/category/{id}', [ProductClientController::class, 'category'])->name('client.product.category');
    Route::get('/product/search', [ProductClientController::class, 'search'])->name('client.product.search');
    Route::get('/product/filter', [ProductClientController::class, 'filter'])->name('client.product.filter');
    Route::get('/product/cart/{id}', [ProductClientController::class, 'cart'])->name('client.product.cart');
    Route::get('/product/shopping', [ProductClientController::class, 'shopping'])->name('client.product.shopping');
    Route::get('/product/confirm', [ProductClientController::class, 'confirm'])->name('client.product.confirm');
    Route::get('/product/history', [ProductClientController::class, 'history'])->name('client.product.history');
    Route::get('/product/details/{id}', [ProductClientController::class, 'details'])->name('client.product.details');

    // Recepies ----------------------------------------------------------------------------------
    Route::post('recipe/{recipeId}/like', [RecipeController::class, 'toggleLike'])->name('client.recipes.like');
    Route::get('/recipe', [RecipeController::class, 'index'])->name('client.recipes.index');
    Route::get('/recipe/create', [RecipeController::class, 'create'])->name('client.recipes.create');
    Route::post('/recipe/store', [RecipeController::class, 'store'])->name('client.recipes.store');
    Route::get('/recipe/{recipeId}', [RecipeController::class, 'show'])->name('client.recipes.show');
    Route::get('/recipe/{recipeId}/edit', [RecipeController::class, 'edit'])->name('client.recipes.edit');
    Route::put('/recipe/{recipeId}', [RecipeController::class, 'update'])->name('client.recipes.update');
    Route::delete('/recipe/{recipeId}', [RecipeController::class, 'destroy'])->name('client.recipes.destroy');
    Route::post('/comments/add', [RecipeController::class, 'addComment'])->name('client.recipes.addComment');

});
// -------------------------------------------------------------------------------------------------------------------

//Admin Routes -------------------------------------------------------------------------------------------------------------------------

Route::middleware(['auth', 'verified','admin'])->group(function () {
    Route::get('/dashboard', [CategoryController::class, 'index'])->name('dashboard');

    Route::get('sendmail', [MailController::class, 'index'])->name('sendmail');
    // category routes----------------------------------------------------------------------------------
    Route::get('/categories/home', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');

    // products root--------------------------------------------------------------------------------------
    Route::get('/products/home', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('admin.products.delete');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/products-export', [ProductController::class, 'export'])->name('product.export');
    Route::post('/products-import', [ProductController::class, 'import'])->name('product.import');
    Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('admin.generatePDF');
    Route::get('/commandes/history', [ProductController::class, 'commandes'])->name('admin.commandes.history');
    Route::get('/commandes/details/{id}', [ProductController::class, 'details'])->name('admin.commandes.details');
    Route::post('/changestatus/{id}', [ProductController::class, 'changestatus'])->name('admin.changestatus');

    // Admin Recepes--------------------------------------------------------------------------
        Route::get('/admin/recipe', [RecipeController::class, 'adminIndex'])->name('admin.recipes.index');
        Route::get('/admin/recipe/create', [RecipeController::class, 'adminCreate'])->name('admin.recipes.create');
        Route::post('/admin/recipe', [RecipeController::class, 'adminStore'])->name('admin.recipes.store');
        Route::get('/admin/recipe/{id}/edit', [RecipeController::class, 'adminEdit'])->name('admin.recipes.edit');
        Route::put('/admin/recipe/{id}', [RecipeController::class, 'adminUpdate'])->name('admin.recipes.update');
    // ------------------------------------------------------------------------------------------------------------

    //user root---------------------------------------------------------------------------
    Route::get('/users/home', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');


});
//-------------------------------------------------------------------------------------------------------------------------------------------






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
