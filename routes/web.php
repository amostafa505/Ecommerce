<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\frontend\cartController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\frontend\indexController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\frontend\languageController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\AdminUserRolesController;
use App\Http\Controllers\backend\ShippingAreaController;
use App\Http\Controllers\backend\SiteSettingController;
use App\Http\Controllers\backend\SubSubCategoryController;
use App\Http\Controllers\frontend\HomeBlogController;
use App\Http\Controllers\User\ReviewController;

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

        Route::prefix('brand')->group(function(){
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

        Route::prefix('product')->group(function(){
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
            Route::get('/Manage/Stock' , [ProductController::class , 'manageStock'])->name('manage.stock');
        });

            // All Admin Slider Route

            Route::prefix('slider')->group(function(){
                Route::get('/view' , [SliderController::class , 'viewSlider'])->name('all.sliders');
                Route::post('/store' , [SliderController::class , 'store'])->name('add.slider');
                Route::get('/edit/{id}' , [SliderController::class , 'editSlider'])->name('edit.slider');
                Route::post('/update' , [SliderController::class , 'updateSlider'])->name('update.slider');
                Route::get('/delete/{id}' , [SliderController::class , 'deleteSlider'])->name('delete.slider');
                Route::get('/inactive/{id}' , [SliderController::class , 'inActiveSlider'])->name('inactive.slider');
                Route::get('/active/{id}' , [SliderController::class , 'activeSlider'])->name('active.slider');
            });

            // All Admin Coupon Route

            Route::prefix('coupon')->group(function(){
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

            });

            // All Admin Orders Route

            Route::prefix('orders')->group(function(){
                //View for All Order Status
                Route::get('/pending/orders' , [OrderController::class , 'pendingOrders'])->name('pending.orders');
                Route::get('/order/details/{id}' , [OrderController::class , 'OrderDetails'])->name('order.details');
                Route::get('/confirmed/orders' , [OrderController::class , 'confirmedOrders'])->name('confirmed.orders');
                Route::get('/processing/orders' , [OrderController::class , 'processingOrders'])->name('processing.orders');
                Route::get('/picked/orders' , [OrderController::class , 'pickedOrders'])->name('picked.orders');
                Route::get('/shipped/orders' , [OrderController::class , 'shippedOrders'])->name('shipped.orders');
                Route::get('/delivered/orders' , [OrderController::class , 'deliveredOrders'])->name('delivered.orders');
                Route::get('/canceled/orders' , [OrderController::class , 'canceledOrders'])->name('canceled.orders');


                //Change Order Status Section
                Route::get('/confirm/order/{order_id}', [OrderController::class , 'confirmOrder'])->name('confirm.Order');
                Route::get('/process/order/{order_id}', [OrderController::class , 'processOrder'])->name('process.Order');
                Route::get('/pick/order/{order_id}', [OrderController::class , 'pickOrder'])->name('pick.Order');
                Route::get('/ship/order/{order_id}', [OrderController::class , 'shipOrder'])->name('ship.Order');
                Route::get('/deliver/order/{order_id}', [OrderController::class , 'deliverOrder'])->name('deliver.Order');
                Route::get('/cancel/order/{order_id}', [OrderController::class , 'cancelOrder'])->name('cancel.Order');
                Route::get('/download/{order_id}' , [OrderController::class , 'adminOrderDownload'])->name('admin.order.download');

                //All Return Order's and Approvals Routes
                Route::get('/order/returned/{order_id}' , [OrderController::class , 'approveReturnRequest'])->name('approve.order.return');
                Route::get('/returned/orders/unapproved', [OrderController::class , 'unapprovedRequest'])->name('returned.orders.unapproved');
                Route::get('/returned/orders/approved', [OrderController::class , 'approvedRequest'])->name('returned.orders.approved');
            });

            // All Admin Slider Route

            Route::prefix('report')->group(function(){
                Route::get('/view' , [ReportController::class , 'viewReports'])->name('all.reports');
                Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');
                Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');
                Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');
            });

            // All Admin Get User Route

            Route::prefix('allusers')->group(function(){
                Route::get('/view' , [AdminProfileController::class , 'viewAllUsers'])->name('all.users');
            });

            // All Admin Blog Route

            Route::prefix('blog')->group(function(){
                // All Blog Category Route
                Route::get('/category/view' , [BlogController::class , 'viewBlogCategory'])->name('all.blog.categories');
                Route::post('/category/store' , [BlogController::class , 'blogStore'])->name('add.blog.category');
                Route::get('/category/edit/{id}' , [BlogController::class , 'editBlogCategory'])->name('edit.blog.category');
                Route::post('/category/update' , [BlogController::class , 'updateBlogCategory'])->name('update.blog.category');
                Route::get('/category/delete/{id}' , [BlogController::class , 'deleteBlogCategory'])->name('delete.blog.category');

                //All Blog Posts Route
                Route::get('/posts/view' , [BlogController::class , 'viewposts'])->name('all.blog.posts');
                Route::get('/post/add' , [BlogController::class , 'blogAdd'])->name('add.blog.posts');
                Route::post('/post/store' , [BlogController::class , 'postStore'])->name('store.blog.post');
                Route::get('/post/edit/{id}' , [BlogController::class , 'editPost'])->name('edit.blog.post');
                Route::post('/post/update' , [BlogController::class , 'updatePost'])->name('update.blog.post');
                Route::get('/post/delete/{id}' , [BlogController::class , 'deletePost'])->name('delete.blog.post');
            });

            // All Admin Get User Route
            Route::prefix('site')->group(function(){
                Route::get('/setting' , [SiteSettingController::class , 'setting'])->name('setting');
                Route::post('/update/setting' , [SiteSettingController::class , 'updateSetting'])->name('update.setting');
                Route::get('/seo' , [SiteSettingController::class , 'seo'])->name('seo');
                Route::post('/update/seo' , [SiteSettingController::class , 'updateSeo'])->name('update.seo');
            });

            // All Admin Review Route
            Route::prefix('review')->group(function(){
                Route::get('/review/pending' , [ReviewController::class , 'pendingReviews'])->name('pending.reviews');
                Route::get('/review/approved' , [ReviewController::class , 'approvedReviews'])->name('approved.reviews');
                Route::get('/approve/review/{review_id}', [ReviewController::class , 'approveReview'])->name('approve.review');
                Route::get('/approve/delete/{review_id}', [ReviewController::class , 'deleteReview'])->name('delete.review');
            });

            // All Admin User Role Route
            Route::prefix('adminuserrole')->group(function(){
                Route::get('/admin/view' , [AdminUserRolesController::class , 'adminsView'])->name('admins.view');
                Route::get('/admin/Create' , [AdminUserRolesController::class , 'createAdmin'])->name('add.admin');
                Route::post('/admin/store',[AdminUserRolesController::class , 'storeAdmin'])->name('admin.user.store');
                Route::get('/admin/edit/{id}' , [AdminUserRolesController::class , 'adminEdit'])->name('admin.edit');
                Route::post('/admin/update',[AdminUserRolesController::class , 'updateAdmin'])->name('admin_update');
                Route::get('/admin/delete/{id}' , [AdminUserRolesController::class , 'deleteAdmin'])->name('admin.delete');
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

//Remove from Wishlist
Route::get('/wishlist/remove/{id}' , [WishlistController::class , 'deleteWishlist'])->name('deleteWishlist');


//Product With Category & SubCategory & SubSubCategory
Route::get('/product/productWithCateogry/{id}/{slug}', [indexController::class , 'categoryProducts'])->name('category.Products');
Route::get('/product/productWithsubCateogry/{id}/{slug}', [indexController::class , 'subCategoryProducts'])->name('subCategory.Products');
Route::get('/product/PWsubsubcategory/{id}/{slug}', [indexController::class , 'subSubCategoryProducts'])->name('subSubCategory.Products');

// Product Search
Route::post('/product/search', [indexController::class , 'productSearch'])->name('product.search');
Route::post('/search-product' , [indexController::class , 'productSearchAjax']);

//Getting Cities For Checkout Page
Route::get('/City/ajax/{country_id}' ,  [ShippingAreaController::class , 'GetCity']);

//Checkout Routes

Route::post('checkout/store',[CheckoutController::class,'checkoutStore'])->name('checkout.Store');

//Main Page View With spacific Language
Route::get('/language/english' , [languageController::class , 'englishLanguage'])->name('english.language');
Route::get('/language/arabic' , [languageController::class , 'arabicLanguage'])->name('arabic.language');

//Apply Coupon
Route::POST('/coupon-apply' , [cartController::class , 'applyCoupon']);

//coupon Calculation
Route::Get('/coupon-calculation' , [cartController::class , 'couponCalculation']);

//coupon Remove
Route::Get('/remove-coupon' , [cartController::class , 'couponRemove']);

//Checkout Section
Route::Get('/checkout-view' , [CheckoutController::class , 'checkoutView'])->name('checkout');

//Blog All Front Routes
Route::get('/blog' , [HomeBlogController::class , 'viewBlogs'])->name('all.blogs');
Route::get('/blog/details/{Blog_id}' , [HomeBlogController::class , 'blogDetails'])->name('blog.details');
Route::get('/blog/category/posts/{category_id}' , [HomeBlogController::class , 'getPostsByCategory'])->name('postsByCategory');

//['auth:sanctum',config('jetstream.auth_session'),'verified']

Route::middleware(['user','auth'])->group(function () {
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

    //Stripe Order Store
    Route::Post('/StripePayment' , [StripeController::class , 'StripeOrder'])->name('Stripe-Order');
    //Cash On Delivery Order Store
    Route::Post('/CashPayment' , [CashController::class , 'cashOrder'])->name('Cash-Order');

    // Users Profile & Logout Section
    Route::get('/user/logout' , [indexController::class , 'userLogout'])->name('user.logout');
    Route::get('/edit/profile' , [indexController::class , 'editProfile'])->name('edit.profile');
    Route::Post('/update/profile' , [indexController::class , 'updateProfile'])->name('update.profile');
    Route::get('/user/edit/password' , [indexController::class , 'userEditPassword'])->name('user.edit.password');
    Route::post('/user/update/password' , [indexController::class , 'userUpdatePassword'])->name('user.update.password');

    //User Orders Section
    Route::get('/user/orders' , [indexController::class , 'userOrders'])->name('user.orders');
    Route::get('/user/order/details/{order_id}' , [indexController::class , 'userOrderDetails'])->name('user.order.details');
    Route::get('/user/order/download/{order_id}' , [indexController::class , 'userOrderDownload'])->name('user.order.download');
    Route::post('/return/order/{order_id}', [indexController::class , 'returnOrder'])->name('return.order');
    Route::get('/user/returned/orders' , [indexController::class , 'userReturnedOrder'])->name('user.returned.orders');
    Route::get('/user/canceled/orders' , [indexController::class , 'userCanceledOrder'])->name('user.canceled.orders');

    //User Review Section
    Route::post('/user/review/{product_id}', [ReviewController::class , 'storeReview'])->name('user.review');

    //Order Tracking
    Route::post('/user/order/tracking' ,[indexController::class , 'orderTracking'])->name('order.tracking');

});

/////////////////End FrontEnd Section


