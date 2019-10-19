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

Route::get('/supplier/view_theme_1', function () {
    return view('themes.view_theme_1');
});

Route::get('/supplier/view_theme_2', function () {
    return view('themes.view_theme_2');
});

/////////////factory dashboard


//Fcatory Login
Route::match(['get','post'],'/factory/login','FactoryController@FactoryLoginPage');

//Fcatory Register page
Route::get('/factory/register','FactoryController@FactoryRegisterPage');

//Factory register form submit
Route::post('/factory/factory-register','FactoryController@register');

// Confirm Factory Account
Route::get('/factory/confirm/{code}','FactoryController@confirmAccount');

//factory login from submit
Route::post('/factory-login','FactoryController@login');


//Factory Logout
Route::get('/factory-logout','FactoryController@logout');

Route::match(['get','post'],'/factory/forgetpassword','FactoryController@forgetpassword');

Route::group(['middleware'=>['factorylogin']],function(){

    ///factory edit stre background image
    Route::match(['get','post'],'/factory/edit-factorystore-background/{id}','FactoryController@editFactoryStoreBackground');


    //edit branch
    Route::match(['GET','POST'],'/factory/edit-branch/{id}','FactoryController@editBranch');

    //delete branch
	Route::match(['get','post'],'/factory/delete-branch/{id}','FactoryController@deleteBranch');

    //Add Factory Branch
    Route::match(['get','post'],'/factory/add-branch','FactoryController@addBranch');

    ///////////ZAID
    Route::match(['get','post'],'/view_factorystore_notice','FactorystoreController@viewfactoryNotice');

    //view factory store
     Route::match(['get','post'],'/view_factorystore/{id}','FactorystoreController@ViewStore');
    //Edit factory store
     Route::match(['get','post'],'/factory/edit-factorystore/{id}','FactorystoreController@editfactorystore');

     Route::match(['get','post'],'/factory/view-theme/{id}','FactorystoreController@viewTheme');

     Route::match(['get','post'],'/factory/edit-factorystore-theme/{id}','FactorystoreController@editFactorystoreTheme');

    Route::match(['GET','POST'],'/factory/factory_edit-branch/{id}','FactoryController@factory_editBranch');
    Route::match(['get','post'],'/factory/factory_delete-branch/{id}','FactoryController@factory_deleteBranch');

    Route::match(['GET','POST'],'/factory/branches','FactoryController@branches');

    Route::match(['get','post'],'/factory/factoty-add-branch','FactoryController@addBranch');



    ////////////ZAID


    // Update Order Status
    Route::post('/factory/update-order-status','ProductsController@updateOrderStatusFactory');

    //Supplier Orders
    Route::get('/factory/view-orders','ProductsController@viewOrdersFactory');

    //view order details factory
    Route::get('/factory/view-order-details/{id}','ProductsController@viewOrderDetailsFactory');

    //view order invoice factory
    Route::get('/factory/view-order-invoice/{id}','ProductsController@viewOrderInvoiceFactory');

    //view banner factory
    Route::get('/factory/view-banners','BannersController@viewBannersFactory');

    ///edit banner factory
    Route::get('/factory/banners/edit-banner/{id}','BannersController@editBannerFactory');


    //delete banner factory
    Route::get('/factory/banners/delete-banner/{id}','BannersController@DeleteBannersFactory');


    /////add banner factory
    Route::match(['get', 'post'],'/factory/add-banner/','BannersController@addBannerFactory');


    //factory Dashboard
Route::get('/factory/dashboard','FactoryController@dashboard');

//profile of Factory
Route::match(['get','post'],'/factory/edit-profile','FactoryController@edit_profile');

 //update factory profile
Route::match(['get','post'],'/factory/update-profile','FactoryController@updateProfile');

// Factory Products Routes
Route::match(['get','post'],'/factory/add-product','ProductsController@addProductFactory');
Route::match(['get','post'],'/factory/edit-product/{id}','ProductsController@editProductFactory');
Route::get('/factory/delete-product/{id}','ProductsController@deleteProductFactory');
Route::get('/factory/view-products','ProductsController@viewProductsFactory');
Route::get('/factory/delete-product-image/{id}','ProductsController@deleteProductImageFactory');
Route::get('/factory/delete-alt-image/{id}','ProductsController@deleteAltImageFactory');
Route::get('/factory/delete-product-video/{id}','ProductsController@deleteProductVideoFactory');


// Factory Product Attributes Routes
Route::match(['get', 'post'], '/factory/add-attributes/{id}','ProductsController@addAttributesFactory');
Route::match(['get', 'post'], '/factory/edit-attributes/{id}','ProductsController@editAttributesFactory');
Route::get('/factory/delete-attribute/{id}','ProductsController@deleteAttributeFactory');

//Factory add images
Route::match(['get', 'post'], '/factory/add-images/{id}','ProductsController@addImagesFactory');

/////ZAID////
//add catagories
Route::match(['get','post'],'/factory/add-category','CategoryController@addCategoryFactory');

//view catagories
Route::get('/factory/view-category','CategoryController@viewCategoriesFactory');

//edit-category
Route::match(['get','post'],'/factory/edit-category/{id}','CategoryController@editCategoryFactory');
//delete-categories
Route::match(['get','post'],'/factory/delete-category/{id}','CategoryController@deleteCategoryFactory');

//Factory Coupon add
Route::match(['get','post'],'/factory/add-coupon','CouponsController@addCouponFactory');

//Factory Coupon View
Route::get('/factory/view-coupons','CouponsController@viewCouponsFactory');

//Factory Coupon Edit
Route::match(['get','post'],'/factory/edit-coupon/{id}','CouponsController@editCouponFactory');

// Factory delete Coupon
Route::match(['get','post'],'/factory/delete-coupon/{id}','CouponsController@deleteCouponFactory');

////zAID/////

});

/////////////////////////////////////////////////////////////////////////////////////////////
//////facebook Social login
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

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
Route::match(['get','post'],'/view_store/{id}','StoreController@viewStore');

//view supplier store
Route::match(['get','post'],'/view_factory/{id}','FactoryStoreController@viewFactoryStore');

//forgot password supplier
Route::match(['get','post'],'/supplier/forgetpassword','SupplierController@forgetpassword');

//all routes after supplier
Route::group(['middleware'=>['supplierlogin']],function(){


    //edit/select theme for store
    Route::match(['get','post'],'/supplier/edit-store-theme/{id}','StoreController@editStoreSupplierTheme');


    //view supplier Themes
    Route::match(['get','post'],'/supplier/view-theme/{id}','StoreController@ViewTheme');

    // Update Order Status
    Route::post('/supplier/update-order-status','ProductsController@updateOrderStatusFactory');

    //Supplier Dashboard
    Route::get('/supplier/dashboard','SupplierController@dashboard');


    //profile of supplier
    Route::get('/supplier/edit-profile','SupplierController@edit_profile');

    //users account page
    Route::match(['GET','POST'],'/supplier/edit-profile','SupplierController@edit_profile');


    //edit branch
    Route::match(['GET','POST'],'/supplier/edit-branch/{id}','SupplierController@editBranch');

    //delete branch
	Route::match(['get','post'],'/supplier/delete-branch/{id}','SupplierController@deleteBranch');

    //supplier branches
    Route::match(['GET','POST'],'/supplier/branches','SupplierController@branches');

    //Add supplier Branch
    Route::match(['get','post'],'/supplier/add-branch','SupplierController@addBranch');

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

    //supplier review for products
    Route::get('/supplier/products-reviews','ReviewController@viewProductsReviews');

    //view reviews of one product
    Route::match(['get','post'],'/supplier/view-review/{id}','ReviewController@viewReviews');


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

    //Supplier Coupon add
    Route::match(['get','post'],'/supplier/add-coupon','CouponsController@addCouponSupplier');

    //Supplier Coupon View
    Route::get('/supplier/view-coupons','CouponsController@viewCouponsSupplier');

    //Supplier Coupon Edit
    Route::match(['get','post'],'/supplier/edit-coupon/{id}','CouponsController@editCouponSupplier');
    // Supplier delete Coupon
    Route::match(['get','post'],'/supplier/delete-coupon/{id}','CouponsController@deleteCouponSupplier');

    //view supplier store Notice
    Route::match(['get','post'],'/view_store_notice','StoreController@viewStoreNotice');

    //Supplier Store Edit
    Route::match(['get','post'],'/supplier/edit-store/{id}','StoreController@editStoreSupplier');
    Route::match(['get','post'],'/supplier/edit-store-background/{id}','StoreController@editStoreSupplierBackground');

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

// ////CHECKING AUTO COMPLETE
// Route::get('search', 'AutoCompleteController@index');
//  Route::get('autocomplete', 'AutoCompleteController@search');

//all routes after login
Route::group(['middleware'=>['frontlogin']],function(){
        //user comment
        Route::match(['GET','POST'],'/add-comment/{id}','ReviewController@addcomment');

        //Delete user comment
        Route::match(['GET','POST'],'supplier/delete-comment/{id}','ReviewController@delcomment');


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
    //for factory edit
    Route::match(['get','post'],'/admin/edit-factories/{id}','FactoryController@editfactory');

    // Admin Factory Route
    Route::get('/admin/view-factories ','FactoryController@viewFactory');

    // Admin design stuff
    Route::match(['get','post'],'/admin/add-design','DesignController@addDesign');

    Route::get('/admin/view-designs','DesignController@viewDesigns');

    // Admin design stuff
    Route::match(['get','post'],'/admin/add-theme','ThemeController@addTheme');

    Route::get('/admin/view-themes','ThemeController@viewThemes');

	Route::match(['get','post'],'/admin/delete-theme/{id}','ThemeController@deleteTheme');


	Route::match(['get','post'],'/admin/delete-design/{id}','DesignController@deleteDesign');

    // Admin  View factories Route
 Route::get('/admin/view-factories','FactoryController@viewFactory');

    Route::get('/admin/dashboard','AdminController@dashboard');
     Route::get('/admin/settings','AdminController@settings');
     Route::get('/admin/check-pwd','AdminController@chkPassword');
     Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

    //for supplier edit
	Route::match(['get','post'],'/admin/edit-supplier/{id}','SupplierController@editSupplier');


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

    // Admin Suppliers Route
    Route::get('/admin/view-suppliers','SupplierController@viewSupplier');

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
