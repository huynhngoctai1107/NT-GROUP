<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\ViewDashboardController;
//demand
use App\Http\Controllers\Admin\Demand\ListDemandController;
use App\Http\Controllers\Admin\Demand\AddDemandController;
use App\Http\Controllers\Admin\Demand\DeleteDemandController;
use App\Http\Controllers\Admin\Demand\EditDemandController;
//category
use App\Http\Controllers\Admin\Category\ListCategoryController;
use App\Http\Controllers\Admin\Category\AddCategoryController;
use App\Http\Controllers\Admin\Category\DeleteCategoryController;
use App\Http\Controllers\Admin\Category\EditCategoryController;
// user
use App\Http\Controllers\Admin\User\ListUserController;
use App\Http\Controllers\Admin\User\AddUserController;
use App\Http\Controllers\Admin\User\DeleteUserController;
use App\Http\Controllers\Admin\User\EditUserController;
//voucher
use App\Http\Controllers\Admin\Voucher\ListVoucherController;
use App\Http\Controllers\Admin\Voucher\AddVoucherController;
use App\Http\Controllers\Admin\Voucher\DeleteVoucherController;
use App\Http\Controllers\Admin\Voucher\EditVoucherController;
//Transactions
use App\Http\Controllers\Admin\Transactions\RechargeHistoryController;

Route::group(['prefix' => 'admin'],function() {


    Route::get('/', [ViewDashboardController::class,'dashboar'])->name('dashboar');

    Route::group(['prefix' => 'demand'],function() {
        Route::get('/list',[ListDemandController::class,'listDemand'])->name('listDemand');
        Route::get('/delete',[DeleteDemandController::class,'deleteDemand'])->name('deleteDemand');
        Route::get('/edit',[EditDemandController::class,'editFormDemand'])->name('editDemand');
        Route::post('/edit',[EditDemandController::class,'editDemand'])->name('editDemand');
        Route::get('/add',[AddDemandController::class,'addFormDemand'])->name('addDemand');
        Route::post('/add',[AddDemandController::class,'addDemand'])->name('addDemand');
    });
    Route::group(['prefix' => 'category'],function() {
        Route::get('/list',[ListCategoryController::class,'listCategory'])->name('listCategory');
        Route::get('/delete',[DeleteCategoryController::class,'deleteCategory'])->name('deleteCategory');
        Route::get('/edit',[EditCategoryController::class,'editFormCategory'])->name('editCategory');
        Route::post('/edit',[EditCategoryController::class,'editCategory'])->name('editCategory');
        Route::get('/add',[AddCategoryController::class,'addFormCategory'])->name('addCategory');
        Route::post('/add',[AddCategoryController::class,'addCategory'])->name('addCategory');
    });
    Route::group(['prefix' => 'user'],function() {
        Route::get('/list',[ListUserController::class,'listUser'])->name('listUser');
        Route::get('/delete',[DeleteUserController::class,'deleteUser'])->name('deleteUser');
        Route::get('/edit/{id}',[EditUserController::class,'editFormUser'])->name('editUser');
        Route::post('/edit',[EditUserController::class,'editUser'])->name('editUser');
        Route::get('/add',[AddUserController::class,'addFormUser'])->name('addUser');
        Route::post('/add',[AddUserController::class,'addUser'])->name('addUser');
    });
    Route::group(['prefix' => 'voucher'],function() {
        Route::get('/list',[ListVoucherController::class,'listVoucher'])->name('listVoucher');
        Route::get('/delete',[DeleteVoucherController::class,'deleteVoucher'])->name('deleteVoucher');
        Route::get('/edit',[EditVoucherController::class,'editFormVoucher'])->name('editVoucher');
        Route::post('/edit',[EditVoucherController::class,'editVoucher'])->name('editVoucher');
        Route::get('/add',[AddVoucherController::class,'addFormVoucher'])->name('addVoucher');
        Route::post('/add',[AddVoucherController::class,'addVoucher'])->name('addVoucher');
    });
    Route::group(['prefix' => 'transactions'],function() {
        Route::get('/list',[RechargeHistoryController::class,'listRechargeHistory'])->name('listRechargeHistory');
       
    });


});




