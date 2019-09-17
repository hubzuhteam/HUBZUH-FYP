<?php

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

///////////////////////////////////////////////////
/////////////////SUPLLIER END//////////////////////
// Route::get('/supplier', function () {
//     return view('supplier.index');
// });

//Supplier Login
Route::match(['get','post'],'/supplier','SupplierController@SupplierLoginPage');

//Supplier Register page
Route::get('/supplier/register','SupplierController@SupplierRegisterPage');

//Supplier register form submit
Route::post('/supplier/supplier-register','SupplierController@register');

// Confirm Supplier Account
Route::get('/supplier/confirm/{code}','SupplierController@confirmAccount');

//supplier login from submit
Route::post('/supplier-login','SupplierController@login');

//Supplier Logout
Route::get('/supplier-logout','SupplierController@logout');

//view supplier store
Route::match(['get','post'],'/view_store/{id}','ProductsController@ViewStore');


//all routes after supplier
Route::group(['middleware'=>['supplierlogin']],function(){

    //Supplier Dashboard
    Route::get('/supplier/dashboard','SupplierController@dashboard');

    //profile of supplier
    Route::get('/supplier/edit-profile','SupplierController@edit_profile');

    //users account page
    Route::match(['GET','POST'],'/supplier/edit-profile','SupplierController@edit_profile');

    //update supplier profile
    Route::match(['get','post'],'/supplier/update-profile','SupplierController@updateProfile');

    //Add category
    Route::match(['get','post'],'/supplier/add-category','CategoryController@addCategorySupplier');

//view catagories
    Route::get('/supplier/view-categories','CategoryController@viewCategoriesSupplier');

    //edit-category
	Route::match(['get','post'],'/supplier/edit-category/{id}','CategoryController@editCategorySupplier');

	Route::match(['get','post'],'/supplier/delete-category/{id}','CategoryController@deleteCategorySupplier');

    // Supplier Products Routes
    Route::match(['get','post'],'/supplier/add-product','ProductsController@addProductSupplier');
    Route::match(['get','post'],'/supplier/edit-product/{id}','ProductsController@editProductSupplier');
    Route::get('/supplier/delete-product/{id}','ProductsController@deleteProductSupplier');
    Route::get('/supplier/view-products','ProductsController@viewProductsSupplier');
    Route::get('/supplier/delete-product-image/{id}','ProductsController@deleteProductImageSupplier');
    Route::get('/supplier/delete-alt-image/{id}','ProductsController@deleteAltImageSupplier');
    Route::get('/supplier/delete-product-video/{id}','ProductsController@deleteProductVideoSupplier');

        	// Supplier Product Attributes Routes
	Route::match(['get', 'post'], '/supplier/add-attributes/{id}','ProductsController@addAttributesSupplier');
    Route::match(['get', 'post'], '/supplier/edit-attributes/{id}','ProductsController@editAttributesSupplier');
    Route::get('/supplier/delete-attribute/{id}','ProductsController@deleteAttributeSupplier');

    //supplier add images
    Route::match(['get', 'post'], '/supplier/add-images/{id}','ProductsController@addImagesSupplier');

    // supplier delete alt image
    Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImageSupplier');

    //Supplier Orders
	Route::get('/supplier/view-orders','ProductsController@viewOrdersSupplier');

    // Supplier Order Details Route
    Route::get('/supplier/view-order/{id}','ProductsController@viewOrderDetailsSupplier');

    // Supplier Order Details Route
    Route::get('/supplier/view-order-invoice/{id}','ProductsController@viewOrderInvoiceSupplier');

        // Supplier Banners Routes
	Route::match(['get','post'],'/supplier/add-banner','BannersController@addBannerSupplier');
	Route::match(['get','post'],'/supplier/edit-banner/{id}','BannersController@editBannerSupplier');
	Route::get('supplier/view-banners','BannersController@viewBannersSupplier');
    // Route::get('/supplier/delete-banner/{id}','BannersController@deleteBanner');

});

//________________________________________________//
/////////////////////////ADMIN AND CUSTOMER////////////////////
//Index Page
Route::get('/','IndexController@index');

// Route::get('/admin','AdminController@login');

Route::match(['get','post'],'/admin','AdminController@login');

// Route::get('/admin/dashboard','AdminController@dashboard');

// Products Filters Route
Route::match(['get', 'post'],'/products-filter', 'ProductsController@filter');

// Category/Listing Page
Route::get('/products/{url}','ProductsController@products');

// Product Detail Page
Route::get('/product/{id}','ProductsController@product');

// Cart Page
Route::match(['get', 'post'],'/cart','ProductsController@cart');


// Update Product Quantity from Cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');


// Get Product Attribute Price
Route::any('/get-product-price','ProductsController@getProductPrice');

// Apply Coupon
Route::post('/cart/apply-coupon','ProductsController@applyCoupon');

//Users Register/Login
Route::get('/login-register','UsersController@userLoginRegister');
//user forgot password
Route::match(['get','post'],'forgot-password','UsersController@forgotPassword');
//Users register form submit
Route::post('/user-register','UsersController@register');

// Confirm Account
Route::get('confirm/{code}','UsersController@confirmAccount');

//User Logout
Route::get('/user-logout','UsersController@logout');

//user login from submit
Route::post('user-login','UsersController@login');
// Search Products
Route::post('/search-products','ProductsController@searchProducts');

//all routes after login
Route::group(['middleware'=>['frontlogin']],function(){

    // Add to Cart Route
Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtocart');

//Add to Wish List
Route::match(['get', 'post'], '/add-wishlist', 'ProductsController@addtowishlist');

// Delete Product from Cart Route
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');
// Delete Product from Cart Route
Route::get('/wishlist/delete-product/{id}','ProductsController@deleteWishListProduct');

// Cart Page
Route::match(['get', 'post'],'/cart','ProductsController@cart');

// Wish List Page
Route::match(['get', 'post'],'/wishlist','ProductsController@wishlist');

//users account page
Route::match(['GET','POST'],'account','UsersController@account');

// Check User Current Password
Route::post('/check-user-pwd','UsersController@chkUserPassword');

// Update User Password
Route::post('/update-user-pwd','UsersController@updatePassword');

// Checkout Page
Route::match(['get','post'],'checkout','ProductsController@checkout');
// Order Review Page
Route::match(['get','post'],'/order-review','ProductsController@orderReview');
// Place Order
Route::match(['get','post'],'/place-order','ProductsController@placeOrder');
// Thanks Page
Route::get('/thanks','ProductsController@thanks');
// Users Orders Page
Route::get('/orders','ProductsController@userOrders');
// User Ordered Products Page
Route::get('/orders/{id}','ProductsController@userOrderDetails');
});


// check if user already exist
Route::match(['GET','POST'],'/check-email','UsersController@checkEmail');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/admin/dashboard','AdminController@dashboard');

Route::group(['middleware' => ['adminlogin']], function () {
    Route::get('/admin/dashboard','AdminController@dashboard');
     Route::get('/admin/settings','AdminController@settings');
     Route::get('/admin/check-pwd','AdminController@chkPassword');
     Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

     //for category
     Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
	Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
     Route::get('/admin/view-categories','CategoryController@viewCategories');

    // Admin Products Routes
    Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
    Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
    Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
    Route::get('/admin/view-products','ProductsController@viewProducts');
    Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
    Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImage');
    Route::get('/admin/delete-product-video/{id}','ProductsController@deleteProductVideo');



	Route::match(['get', 'post'], '/admin/add-images/{id}','ProductsController@addImages');


    	// Admin Product Attributes Routes
	Route::match(['get', 'post'], '/admin/add-attributes/{id}','ProductsController@addAttributes');
    Route::match(['get', 'post'], '/admin/edit-attributes/{id}','ProductsController@editAttributes');
    Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');
    // Route::match(['get', 'post'], '/admin/edit-attributes/{id}','ProductsController@editAttributes');

    	// Admin Coupon Routes
    Route::match(['get','post'],'/admin/add-coupon','CouponsController@addCoupon');
    Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editCoupon');
	Route::get('/admin/view-coupons','CouponsController@viewCoupons');
    Route::get('/admin/delete-coupon/{id}','CouponsController@deleteCoupon');

    // Admin Banners Routes
	Route::match(['get','post'],'/admin/add-banner','BannersController@addBanner');
	Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner');
	Route::get('admin/view-banners','BannersController@viewBanners');
    Route::get('/admin/delete-banner/{id}','BannersController@deleteBanner');

    // Admin Orders Routes
	Route::get('/admin/view-orders','ProductsController@viewOrders');

	// Admin Order Details Route
	Route::get('/admin/view-order/{id}','ProductsController@viewOrderDetails');

	// Admin Order Details Route
	Route::get('/admin/view-order-invoice/{id}','ProductsController@viewOrderInvoice');

	// Update Order Status
    Route::post('/admin/update-order-status','ProductsController@updateOrderStatus');

	// Admin Users Route
    Route::get('/admin/view-users','UsersController@viewUsers');

    // Admin/Subadmin  Route
    Route::get('/admin/view-admins','AdminController@viewAdmins');

    //Add Admins/subadmins Route
	Route::match(['get','post'],'/admin/add-admin','AdminController@addAdmin');

    //Edit Admins/subadmins Route
	Route::match(['get','post'],'/admin/edit-admin/{id}','AdminController@editAdmin');


    // Add CMS Route
	Route::match(['get','post'],'/admin/add-cms-page','CmsController@addCmsPage');

	// Edit CMS Route
	Route::match(['get','post'],'/admin/edit-cms-page/{id}','CmsController@editCmsPage');

	// View CMS Pages Route
	Route::get('/admin/view-cms-pages','CmsController@viewCmsPages');

	// Delete CMS Route
	Route::get('/admin/delete-cms-page/{id}','CmsController@deleteCmsPage');

});


Route::get('/logout','AdminController@logout');
// Display Contact Page
Route::match(['get','post'],'/page/contact','CmsController@contact');


// Display CMS Page
Route::match(['get','post'],'/page/{url}','CmsController@cmsPage');
