<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductBrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TitleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
 
// });

require __DIR__.'/auth.php';

//Frontend Route

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about-us',[HomeController::class],'aboutUs')->name('about');
Route::get('/products/{id}',[App\Http\Controllers\HomeController::class,'productDetails'])->name('productdetails');


// Backend Route

Route::middleware(['auth', 'verified'])->prefix('dashboard/')->name('admin.')->group(function(){
        Route::get('/',[DashboardController::class,'index'])->name('home');

        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('banner', BannerController::class)->except('create','show');
        Route::resource('title',TitleController::class);
        Route::resource('testimonial',TestimonialController::class);
        Route::resource('brand',BrandController::class);
        Route::resource('count',CountController::class);
        Route::resource('about',AboutController::class)->except('show', 'create', 'store', 'destroy');
        Route::resource('category',CategoryController::class);
        Route::resource('subcategory',SubCategoryController::class);
        Route::resource('productbrand',ProductBrandController::class);
        Route::resource('product',ProductController::class);
       

});
