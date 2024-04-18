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
Route::post('/post_contract', [homeController::class, 'post_contract'])->name('post_contract');
Route::get('/detail/{type}/{slug}', [homeController::class, 'detail'])->name('detail');




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
    Route::get('/edituser/{id}', [adminController::class, 'edituser'])->name('edituser');
    Route::post('/searchuser', [adminController::class, 'searchuser'])->name('searchuser');
    Route::get('/adduser', [adminController::class, 'adduser'])->name('adduser');
    Route::post('/post_adduser', [adminController::class, 'post_adduser'])->name('post_adduser');
    Route::delete('/delete_user/{id}', [adminController::class, 'deleteuser'])->name('admin.delete_user');
    Route::get('/changeroleuser', [adminController::class, 'changeroleuser'])->name('changeroleuser');

// ===========
    Route::get('/edit_service/{type}/{id}', [adminController::class, 'edit_service'])->name('admin.editservice');
    Route::get('/confirm/{type}/{id}', [adminController::class, 'confirm'])->name('admin.confirm');
    Route::get('/add_service/{type}', [adminController::class, 'add_service'])->name('admin.add_service');
    
    // Hosting Routes
    Route::get('/listhosting', [adminController::class, 'listhosting'])->name('admin.listhosting');
    Route::post('/post_edithosting/{id}', [adminController::class, 'post_edithosting'])->name('admin.post_edithosting');
    Route::post('/post_addhosting', [adminController::class, 'post_addhosting'])->name('admin.post_addhosting');
    Route::delete('/delete_hosting/{id}', [adminController::class, 'delete_hosting'])->name('admin.delete_hosting');
    

    // VPS Routes
    Route::get('/listvps', [adminController::class, 'listvps'])->name('admin.listvps');
    Route::post('/post_editvps/{id}', [adminController::class, 'post_editvps'])->name('admin.post_editvps');
    Route::post('/post_addvps', [adminController::class, 'post_addvps'])->name('admin.post_addvps');
    Route::delete('/delete_vps/{id}', [adminController::class, 'delete_vps'])->name('admin.delete_vps');
});
