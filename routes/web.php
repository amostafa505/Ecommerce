<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\frontend\indexController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SubSubCategoryController;

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
    return view('welcome');
});


// All Admin Routes
Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.index');})->name('dashboard')->middleware('auth:admin');
    Route::get('/admin/profile' , [AdminProfileController::class , 'viewprofile'])->name('admin.profile');
    Route::get('/admin/profile/edit' , [AdminProfileController::class , 'editprofile'])->name('admin.proedit');
    Route::Post('/admin/profile/update' , [AdminProfileController::class , 'updateprofile'])->name('admin.proupdate');
    Route::get('/admin/password/edit' , [AdminProfileController::class , 'editpassword'])->name('admin.edit.password');
    Route::Post('/admin/password/update' , [AdminProfileController::class , 'updatepassword'])->name('admin.update.password');
    Route::get('/admin/logout' , [AdminController::class , 'destroy'])->name('admin.logout');

    // All Admin Brands Route

    Route::prefix('Brand')->group(function(){
        Route::get('/view' , [BrandController::class , 'viewBrand'])->name('all.brands');
        Route::post('/store' , [BrandController::class , 'store'])->name('add.brand');
        Route::get('/edit/{id}' , [BrandController::class , 'editBrand'])->name('edit.brand');
        Route::post('/update' , [BrandController::class , 'updateBrand'])->name('update.brand');
        Route::get('/delete/{id}' , [BrandController::class , 'deleteBrand'])->name('delete.brand');
    });

    // All Admin categorys Route

    Route::prefix('category')->group(function(){
        Route::get('/view' , [CategoryController::class , 'viewCategory'])->name('all.categories');
        Route::post('/store' , [CategoryController::class , 'store'])->name('add.category');
        Route::get('/edit/{id}' , [CategoryController::class , 'editCategory'])->name('edit.category');
        Route::post('/update' , [CategoryController::class , 'updateCategory'])->name('update.category');
        Route::get('/delete/{id}' , [CategoryController::class , 'deleteCategory'])->name('delete.category');
        Route::get('/subcategory/view' , [SubCategoryController::class , 'viewSubCategory'])->name('all.subcategories');
        Route::post('/subcategory/store' , [SubCategoryController::class , 'store'])->name('add.subcategory');
        Route::get('/subcategory/edit/{id}' , [SubCategoryController::class , 'editSubCategory'])->name('edit.subcategory');
        Route::post('/subcategory/update' , [SubCategoryController::class , 'updateSubCategory'])->name('update.subcategory');
        Route::get('/subcategory/delete/{id}' , [SubCategoryController::class , 'deleteSubCategory'])->name('delete.subcategory');
        Route::get('/SubSubCategory/view' , [SubSubCategoryController::class , 'viewSubSubCategory'])->name('all.subsubcategories');
        Route::post('/SubSubCategory/store' , [SubSubCategoryController::class , 'store'])->name('add.subSubCategory');
        Route::get('/SubSubCategory/edit/{id}' , [SubSubCategoryController::class , 'editSubSubCategory'])->name('edit.subsubcategory');
        Route::post('/SubSubCategory/update' , [SubSubCategoryController::class , 'updateSubSubCategory'])->name('update.subsubcategory');
        Route::get('/SubSubCategory/delete/{id}' , [SubSubCategoryController::class , 'deleteSubSubCategory'])->name('delete.subsubcategory');
        Route::get('/subcategory/ajax/{category_id}' ,  [SubSubCategoryController::class , 'GetSubCategory']);
        Route::get('/subsubcategory/ajax/{subcategory_id}' ,  [SubSubCategoryController::class , 'GetSubSubCategory']);
    });

        // All Admin Product Route

    Route::prefix('Product')->group(function(){
        Route::get('/view' , [ProductController::class , 'viewProduct'])->name('all.products');
        Route::get('/add' , [ProductController::class , 'addProduct'])->name('add.product');
        Route::post('/store' , [ProductController::class , 'store'])->name('store.product');
        Route::get('/edit/{id}' , [ProductController::class , 'editProduct'])->name('edit.product');
        Route::post('/update' , [ProductController::class , 'updateProduct'])->name('update.product');
        Route::get('/delete/{id}' , [ProductController::class , 'deleteProduct'])->name('delete.product');
        Route::post('/multiimage/update' , [ProductController::class , 'updateMultiImage'])->name('update.product.multiImage');
        Route::get('/multiImage/delete/{id}' , [ProductController::class , 'multiImagedelete'])->name('delete.product.multiImage');
        Route::post('/image/update' , [ProductController::class , 'updateProductImage'])->name('update.product.image');
        Route::get('/img/delete/{id}' , [ProductController::class , 'deleteProductImage'])->name('delete.product.image');
        Route::get('/inactive/{id}' , [ProductController::class , 'inActiveProduct'])->name('inactive.product');
        Route::get('/active/{id}' , [ProductController::class , 'activeProduct'])->name('active.product');
    });
});
Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login' , [AdminController::class , 'loginForm']);
    Route::post('admin/login' , [AdminController::class , 'store'])->name('admin.login');

});


// All Home Routes
Route::get('/' , [indexController::class , 'index']);
Route::get('/user/logout' , [indexController::class , 'userLogout'])->name('user.logout');
Route::get('/edit/profile' , [indexController::class , 'editProfile'])->name('edit.profile');
Route::Post('/update/profile' , [indexController::class , 'updateProfile'])->name('update.profile');
Route::get('/user/edit/password' , [indexController::class , 'userEditPassword'])->name('user.edit.password');
Route::post('/user/update/password' , [indexController::class , 'userUpdatePassword'])->name('user.update.password');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [indexController::class , 'userProfile'])->name('dashboard');
});


