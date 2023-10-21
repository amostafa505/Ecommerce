<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\frontend\cartController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\frontend\indexController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\frontend\languageController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\ShippingAreaController;
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

Route::middleware('auth:admin')->group(function(){
    // All Backend Routes
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

            // All Admin Slider Route

            Route::prefix('Slider')->group(function(){
                Route::get('/view' , [SliderController::class , 'viewSlider'])->name('all.sliders');
                Route::post('/store' , [SliderController::class , 'store'])->name('add.slider');
                Route::get('/edit/{id}' , [SliderController::class , 'editSlider'])->name('edit.slider');
                Route::post('/update' , [SliderController::class , 'updateSlider'])->name('update.slider');
                Route::get('/delete/{id}' , [SliderController::class , 'deleteSlider'])->name('delete.slider');
                Route::get('/inactive/{id}' , [SliderController::class , 'inActiveSlider'])->name('inactive.slider');
                Route::get('/active/{id}' , [SliderController::class , 'activeSlider'])->name('active.slider');
            });

            // All Admin Coupon Route

            Route::prefix('Coupon')->group(function(){
                Route::get('/view' , [CouponController::class , 'viewCoupon'])->name('all.coupons');
                Route::post('/store' , [CouponController::class , 'store'])->name('add.coupon');
                Route::get('/edit/{id}' , [CouponController::class , 'editCoupon'])->name('edit.coupon');
                Route::post('/update' , [CouponController::class , 'updateCoupon'])->name('update.coupon');
                Route::get('/delete/{id}' , [CouponController::class , 'deleteCoupon'])->name('delete.coupon');
                Route::get('/inactive/{id}' , [CouponController::class , 'inActiveCoupon'])->name('inactive.coupon');
                Route::get('/active/{id}' , [CouponController::class , 'activeCoupon'])->name('active.coupon');
            });

            // All Admin Shipping Area Route

            Route::prefix('shippingarea')->group(function(){
                // // Shipping Division
                // Route::get('/divison/view' , [ShippingAreaController::class , 'viewDivision'])->name('all.divisions');
                // Route::post('/divison/store' , [ShippingAreaController::class , 'storeDivision'])->name('add.division');
                // Route::get('/divison/edit/{id}' , [ShippingAreaController::class , 'editDivision'])->name('edit.division');
                // Route::post('/divison/update' , [ShippingAreaController::class , 'updateDivision'])->name('update.division');
                // Route::get('/divison/delete/{id}' , [ShippingAreaController::class , 'deleteDivision'])->name('delete.division');
                // Shipping Country
                Route::get('/Country/view' , [ShippingAreaController::class , 'viewCountry'])->name('all.countries');
                Route::post('/Country/store' , [ShippingAreaController::class , 'storeCountry'])->name('add.country');
                Route::get('/Country/edit/{id}' , [ShippingAreaController::class , 'editCountry'])->name('edit.country');
                Route::post('/Country/update' , [ShippingAreaController::class , 'updateCountry'])->name('update.country');
                Route::get('/Country/delete/{id}' , [ShippingAreaController::class , 'deleteCountry'])->name('delete.country');
                // Shipping City
                Route::get('/city/view' , [ShippingAreaController::class , 'viewCities'])->name('all.cities');
                Route::post('/city/store' , [ShippingAreaController::class , 'storeCity'])->name('add.city');
                Route::get('/city/edit/{id}' , [ShippingAreaController::class , 'editCity'])->name('edit.city');
                Route::post('/city/update' , [ShippingAreaController::class , 'updateCity'])->name('update.city');
                Route::get('/city/delete/{id}' , [ShippingAreaController::class , 'deleteCity'])->name('delete.city');
                Route::get('/Country/ajax/{country_id}' ,  [ShippingAreaController::class , 'GetCountry']);
            });


    });
});

Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login' , [AdminController::class , 'loginForm']);
    Route::post('admin/login' , [AdminController::class , 'store'])->name('admin.login');

});
///////////////////////End Backend Section///////////////////////




// Start All FrontEnd Routes
Route::get('/' , [indexController::class , 'index']);
Route::get('/user/logout' , [indexController::class , 'userLogout'])->name('user.logout');
Route::get('/edit/profile' , [indexController::class , 'editProfile'])->name('edit.profile');
Route::Post('/update/profile' , [indexController::class , 'updateProfile'])->name('update.profile');
Route::get('/user/edit/password' , [indexController::class , 'userEditPassword'])->name('user.edit.password');
Route::post('/user/update/password' , [indexController::class , 'userUpdatePassword'])->name('user.update.password');

// Product View
Route::get('/product/details/{id}/{slug}' , [indexController::class , 'productDetails'])->name('product.details');

//product Modal View With Ajax
Route::get('/product/view/modal/{id}' , [indexController::class , 'productModalAjax'])->name('productViewAjax');

//Product Store to Cart
Route::POST('/cart/data/store/{id}' , [cartController::class , 'addToCart'])->name('productStoreAjax');

//Product View to MiniCart
Route::get('/product/getminicart/' , [cartController::class , 'viewMiniCart'])->name('productViewAjax');

//Product remove from MiniCart
Route::get('/product/removeminicart/{rowid}' , [cartController::class , 'removeMiniCart'])->name('productRemoveAjax');

//Product Tags View
Route::get('/product/tag/{slug}' , [indexController::class , 'productTags'])->name('product.tags');

//Add To Wishlist
Route::POST('/addToWishList/{id}' , [cartController::class , 'addToWishlist'])->name('addToWishilist');

//View Wishlist
Route::get('/view/wishlist/' , [WishlistController::class , 'viewWishlist'])->name('wishlist');

//Remove from Wishlist
Route::get('/wishlist/remove/{id}' , [WishlistController::class , 'deleteWishlist'])->name('deleteWishlist');


//Product With Category & SubCategory & SubSubCategory
Route::get('/product/productWithCateogry/{id}/{slug}', [indexController::class , 'categoryProducts'])->name('category.Products');
Route::get('/product/productWithsubCateogry/{id}/{slug}', [indexController::class , 'subCategoryProducts'])->name('subCategory.Products');
Route::get('/product/PWsubsubcategory/{id}/{slug}', [indexController::class , 'subSubCategoryProducts'])->name('subSubCategory.Products');



//Main Page View With spacific Language
Route::get('/language/english' , [languageController::class , 'englishLanguage'])->name('english.language');
Route::get('/language/arabic' , [languageController::class , 'arabicLanguage'])->name('arabic.language');

//Apply Coupon
Route::POST('/coupon-apply' , [cartController::class , 'applyCoupon']);

//coupon Calculation
Route::Get('/coupon-calculation' , [cartController::class , 'couponCalculation']);

//coupon Remove
Route::Get('/remove-coupon' , [cartController::class , 'couponRemove']);



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [indexController::class , 'userProfile'])->name('dashboard');
    //Add To Wishlist
    Route::POST('/addToWishList/{id}' , [cartController::class , 'addToWishlist'])->name('addToWishilist');

    //View Wishlist
    Route::get('/view/wishlist/' , [WishlistController::class , 'viewWishlist'])->name('wishlist');

    //Remove from Wishlist
    Route::get('/wishlist/remove/{id}' , [WishlistController::class , 'deleteWishlist'])->name('deleteWishlist');

    //View Cart Page
    Route::get('/view/cartPage/' , [CartPageController::class , 'viewCartPage'])->name('Mycart');

    //Remove from Cart Page
    Route::get('/cartPage/remove/{rowId}' , [CartPageController::class , 'RemoveCartProduct'])->name('deleteCartProduct');

    Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);

    Route::get('/cart-Decrement/{rowId}', [CartPageController::class, 'CartDecrement']);
});

/////////////////End FrontEnd Section


