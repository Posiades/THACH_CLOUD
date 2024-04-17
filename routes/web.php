<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\cartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

//========================== Home Route Area ========================

Route::get('/', [homeController::class, 'index'])->name('index');
Route::get('/about', [homeController::class, 'about'])->name('about');
Route::get('/hosting', [homeController::class, 'hosting'])->name('hosting');
Route::get('/vps', [homeController::class, 'vps'])->name('vps');
Route::get('/contract', [homeController::class, 'contract'])->name('contract');
Route::get('/hosting/{slug}', [homeController::class, 'detail'])->name('detailhosting');
Route::get('/vps/{slug}', [homeController::class, 'detailvps'])->name('detailvps');




// ====================== User Routes Area ===========================

Route::prefix('user')->group(function () {
    Route::get('/userdashboard', [userController::class, 'userdashboard'])->name('user.dashboard');
        Route::get('/login', [userController::class, 'login'])->name('login');
        Route::post('/post_login', [UserController::class, 'post_login'])->name('user.post_login');
        Route::get('/register', [UserController::class, 'register'])->name('user.register');
        Route::post('/post_register', [UserController::class, 'post_register'])->name('user.post_register');
        Route::get('/logout', [userController::class, 'logout'])->name('user.logout');
        Route::get('/forgotpass', [userController::class, 'forgotpass'])->name('forgotpass');
        Route::post('/post_changepass', [userController::class, 'post_mailconfirm'])->name('user.changepass');
        Route::get('/passrest/{token}/{email}', [userController::class, 'passreset'])->name('password.reset');
        Route::post('/post_confirmpass/{email}', [userController::class, 'post_confirmpass'])->name('user.confirmpass');
        Route::get('/errorpass', [userController::class, 'errorpass'])->name('user.error');
    });

// ============================= Cart Routes Area ===========================

    Route::get('/showcart', [cartController::class, 'showcart'])->name('showcart');
    Route::post('/addcart_hosting/{id}', [cartController::class, 'addcart_hosting'])->name('addcart_hosting');
    Route::post('/payment_vnp/{type}', [cartController::class, 'payment_vpn'])->name('payment_vnpay');
    Route::post('/addcart/{type}/{id}', [cartController::class, 'add_cart'])->name('addcart');
    Route::post('/update_cart', [cartController::class, 'update_cart'])->name('cart.update');
    Route::get('/removeitem/{id}', [cartController::class, 'removeitem'])->name('removeitem');
    Route::get('/payment/{total}', [cartController::class, 'payment_total'])->name('payment_total');



//============================== Admin Routes Area ============================

Route::group(['prefix' => 'admin', 'middleware' => 'checkadmin'], function () {
    Route::get('/dashboard', [adminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [adminController::class, 'logout'])->name('admin.logout');
    
    
    
    // User Control
    
    Route::get('/listclient', [adminController::class, 'listclient'])->name('listclient');
    Route::post('/searchuser', [adminController::class, 'searchuser'])->name('admin.searchuser');
    Route::get('/adduser/{username}', [adminController::class, 'adduser'])->name('adduser');
    Route::get('/edituser/{email}', [adminController::class, 'edituser'])->name('admin.edituser');


    // Hosting Routes
    Route::get('/listhosting', [adminController::class, 'listhosting'])->name('admin.listhosting');
    Route::get('/addhosting', [adminController::class, 'addhosting'])->name('admin.addhosting');
    Route::post('/post_addhosting', [adminController::class, 'post_addhosting'])->name('admin.post_addhosting');
    Route::get('/edithosting/{id}', [adminController::class, 'edithosting'])->name('admin.edithosting');
    Route::post('/post_edithosting/{id}', [adminController::class, 'post_edithosting'])->name('admin.post_edithosting');
    Route::delete('/delete_hosting/{id}', [adminController::class, 'delete_hosting'])->name('admin.delete_hosting');
    Route::get('/confirm/{name}', [adminController::class, 'confirm'])->name('admin.confirm');

    // VPS Routes
    Route::get('/listvps', [adminController::class, 'listvps'])->name('admin.listvps');
    Route::get('/edit_vps/{id}', [adminController::class, 'edit_vps'])->name('admin.editvps');
    Route::post('/post_editvps/{id}', [adminController::class, 'post_editvps'])->name('admin.post_editvps');
    Route::get('/addvps', [adminController::class, 'addvps'])->name('admin.addvps');
    Route::post('/post_addvps', [adminController::class, 'post_addvps'])->name('admin.post_addvps');
    Route::get('/confirm_vps/{id}', [adminController::class, 'confirm_vps'])->name('admin.confirm_vps');
    Route::delete('/delete_vps/{id}', [adminController::class, 'delete_vps'])->name('admin.delete_vps');
});
