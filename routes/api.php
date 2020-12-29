<?php

// use App\Http\Controllers\Api\ProductsController;
// use App\Product;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'Api', 'as' => 'api.'], function () {

    // USER AUTH ***********************************************************************************
    Route::post('login', 'LoginController@login')->name('login');

    Route::post('register', 'RegisterController@register')->name('register');

    Route::group(['middleware' => ['auth:api']], function () {

        // AUTHENTICATED ******************************************************************************
        Route::get('email/verify/{hash}', 'VerificationController@verify')->name('verification.verify');

        Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');

        Route::get('user', 'AuthenticationController@user')->name('user');

        Route::post('logout', 'LoginController@logout')->name('logout');

        // USERS ***********************************************************************************
        Route::get('all-users', 'UsersController@getAllUsers')->name('getAllUsers');

        Route::get('admin-users', 'UsersController@getAdminUsers')->name('getAdminUsers');

        Route::get('customer-users', 'UsersController@getCustomerUsers')->name('getCustomerUsers');

        Route::get('manager-users', 'UsersController@getManagerUsers')->name('getManagerUsers');

        // PRODUCTS ***********************************************************************************
        Route::post('register-product', 'ProductsController@registerProduct')->name('registerProduct');

        Route::post('update-product/{id}', 'ProductsController@updateProduct')->name('updateProduct');

        Route::delete('delete-product/{id}', 'ProductsController@deleteProduct')->name('deleteProduct');
        // CATEGORIES ***********************************************************************************
        Route::post('register-category', 'CategoriesController@registerCategory')->name('registerCategory');

        Route::post('update-category/{id}', 'CategoriesController@updateCategory')->name('updateCategory');

        Route::delete('delete-category/{id}', 'CategoriesController@deleteCategory')->name('deleteCategory');
        // SUBCATEGORIES ********************************************************************************
        Route::post('register-subcategory', 'SubCategoriesController@registerSubCategory')->name('registerSubCategory');

        Route::post('update-subcategory/{id}', 'SubCategoriesController@updateSubCategory')->name('updateSubCategory');

        Route::delete('delete-subcategory/{id}', 'SubCategoriesController@deleteSubCategory')->name('deleteSubCategory');
        //CART
        Route::post('add-to-c-cart', 'CartController@addToClientCart')->name('addToClientCart');

        Route::get('get-c-cart/{id}', 'CartController@getClientCart')->name('getClientCart');
    });

    /*CLIENT AREA */

    //PRODUCTS
    Route::get('products', 'ProductsController@getAllProducts')->name('getAllProducts');

    Route::get('product/{id}', 'ProductsController@getOneProduct')->name('getOneProduct');

    Route::get('products/category/{id}', 'ProductsController@getAllByCategory')->name('getByCategory');

    Route::get('products/subcategory/{id}', 'ProductsController@getAllBySubCategory')->name('getBySubCategory');

    //CATEGORIES
    Route::get('categories', 'CategoriesController@getAllCategories')->name('getAllCategories');

    Route::get('category/{id}', 'CategoriesController@getOneCategory')->name('getOneCategory');

    Route::get('has-subcategories/{id}', 'CategoriesController@hasSubCategories')->name('hasSubCategory');

    //SUBCATEGORIES
    Route::get('subcategories', 'SubCategoriesController@getAllSubCategories')->name('getAllSubCategories');

    Route::get('subcategory/{id}', 'SubCategoriesController@getOneSubCategory')->name('getOneSubCategory');

    Route::get('belongs-to-category/{id}', 'SubCategoriesController@belongsToCategory')->name('belongsToCategory');
    //Cart
    Route::post('add-to-g-cart', 'CartController@addToGuestCart')->name('addToGuestCart');
});
