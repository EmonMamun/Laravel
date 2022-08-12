<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::get('/customerCreate',[HomeController::class,'customerReg'])->name('customerReg');
Route::post('/customerCreate',[HomeController::class,'validateCustomerAndSave']);
Route::post('/login',[HomeController::class,'loginValidation']);
Route::get('/restaurantCreate',[HomeController::class,'restaurantReg'])->name('restaurantReg');
Route::post('/restaurantCreate',[HomeController::class,'validateRestaurantAndSave']);

Route::group(['middleware'=>['CustomerAuth']],function(){
    Route::get('/customer/dashbord',[CustomerController::class,'showDashbord'])->name('customerhome');
    Route::get('/customer/logout',[CustomerController::class,'logout'])->name('customerLogout');
    Route::get('/customer/cart',[CustomerController::class,'showCart'])->name('cart');
    Route::get('/customer/showRestaurant/{rId}',[CustomerController::class,'showRes'])->name('showRes');
    Route::post('/customer/dashbord',[CustomerController::class,'searchResults'])->name('search');
    Route::post('/customer/showRestaurant/getFood',[CustomerController::class,'getFood'])->name('customer.getFood');
    Route::post('/customer/cart/confirmOrder',[CustomerController::class,'confirmOrder']);
    Route::get('/customer/orders',[CustomerController::class,'showOrders'])->name('orders');
});

Route::group(['middleware'=>['RestaurantAuth']],function(){
    Route::get('/restaurant/dashbord',[RestaurantController::class,'showDashbord'])->name('restaurantHome');
    Route::get('/restaurant/logout',[RestaurantController::class,'logout'])->name('logout');
    Route::get('/restaurant/addfood',[RestaurantController::class,'addFood'])->name('addFood');
    Route::post('/restaurant/addfood',[RestaurantController::class,'addFoodOnDb']);
    Route::get('/restaurant/foodUpdate/{foodId}',[RestaurantController::class,'foodUpdate'])->name('updateFood');
    Route::post('/retaurant/foodUpdate',[RestaurantController::class,'updateValid'])->name('VF');
    Route::get('/restaurant/deleteFood/{foodId}',[RestaurantController::class,'deleteFood'])->name('deleteFood');
    Route::get('/restaurant/pendingOrder',[RestaurantController::class,'showPendings'])->name('pendingOrders');
    Route::get('/restaurant/updatePanToCook/{orderid}',[RestaurantController::class,'updatePanToCook'])->name('updatePanToCook');
    Route::get('/restaurant/updateCookToDeliver/{orderid}',[RestaurantController::class,'updateCookToDeliver'])->name('updateCookToDeliver');
    Route::get('/restaurant/showCook',[RestaurantController::class,'showCook'])->name('showCook');
    Route::get('/restaurant/updateDeliver/{orderid}',[RestaurantController::class,'updateCookToDeliver'])->name('updateDeliver');
    Route::get('/restaurant/showDeliver',[RestaurantController::class,'ShowDeliver'])->name('showDeliver');
    
});
Route::group(['middleware'=>['AdminAuth']],function(){
    Route::get('/admin/dashboard',[AdminController::class,'showDashbord'])->name('adminDashbord');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('logout');
    Route::get('/admin/retaurant/approve/{add}',[AdminController::class,'approve'])->name('approve');
});