<?php

use App\Http\Controllers\Admin\Category\AddCategoryController;
use App\Http\Controllers\Admin\Category\DeleteCategoryController;
use App\Http\Controllers\Admin\Category\EditCategoryController;
use App\Http\Controllers\Admin\Category\ListCategoryController;
use App\Http\Controllers\Admin\Dashboard\ViewDashboardController;
use App\Http\Controllers\Admin\Demand\AddDemandController;
use App\Http\Controllers\Admin\Demand\DeleteDemandController;
use App\Http\Controllers\Admin\Demand\EditDemandController;
use App\Http\Controllers\Admin\Demand\ListDemandController;
use App\Http\Controllers\Admin\Transactions\RechargeHistoryController;

use App\Http\Controllers\Admin\User\AddUserController;
use App\Http\Controllers\Admin\User\DeleteUserController;
use App\Http\Controllers\Admin\User\EditUserController;
use App\Http\Controllers\Admin\User\ListUserController;

use App\Http\Controllers\Admin\Voucher\AddVoucherController;
use App\Http\Controllers\Admin\Voucher\DeleteVoucherController;
use App\Http\Controllers\Admin\Voucher\EditVoucherController;
use App\Http\Controllers\Admin\Voucher\ListVoucherController;
//admin
use App\Http\Controllers\Admin\Posts\ListPostsController;
use App\Http\Controllers\Admin\Posts\DeletePostsController;
use App\Http\Controllers\Admin\Posts\EditPostsController;
use App\Http\Controllers\Admin\Posts\AddPostsController;

use App\Http\Controllers\Client\Account\AccountController;
use App\Http\Controllers\Client\Account\FogetPasswordController;
use App\Http\Controllers\Client\Account\LoginController;
use App\Http\Controllers\Client\Account\SignUpController;
use App\Http\Controllers\Client\Blog\BlogListController;
use App\Http\Controllers\Client\Blog\PostSingleController;
use App\Http\Controllers\Client\Index\IndexController;
use App\Http\Controllers\Client\Post\AddPostController;
use App\Http\Controllers\Client\Post\PostListController;
use App\Http\Controllers\Client\Post\PostNewController;
use App\Http\Controllers\Client\Search\SearchController;
use App\Http\Controllers\Client\About\AboutController;
use App\Http\Controllers\Client\Contact\ContactController;

use App\Http\Controllers\Client\Docs\DocsController;

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function (){
    Route::get('/', [ViewDashboardController::class, 'dashboar'])->name('dashboar');
    Route::group(['prefix' => 'demand'], function (){
        Route::get('/list', [ListDemandController::class, 'listDemand'])->name('listDemand');
        Route::get('/delete', [DeleteDemandController::class, 'deleteDemand'])
             ->name('deleteDemand');
        Route::get('/edit', [EditDemandController::class, 'editFormDemand'])->name('editDemand');
        Route::post('/edit', [EditDemandController::class, 'editDemand'])->name('editDemand');
        Route::get('/add', [AddDemandController::class, 'addFormDemand'])->name('addDemand');
        Route::post('/add', [AddDemandController::class, 'addDemand'])->name('addDemand');
    });
    Route::group(['prefix' => 'category'], function (){
        Route::get('/list', [ListCategoryController::class, 'listCategory'])->name('listCategory');
        Route::get('/delete', [DeleteCategoryController::class, 'deleteCategory'])->name('deleteCategory');
        Route::get('/edit', [EditCategoryController::class, 'editFormCategory'])->name('editCategory');
        Route::post('/edit', [EditCategoryController::class, 'editCategory'])->name('editCategory');
        Route::get('/add', [AddCategoryController::class, 'addFormCategory'])->name('addCategory');
        Route::post('/add', [AddCategoryController::class, 'addCategory'])->name('addCategory');
    });
    Route::group(['prefix' => 'user'], function (){
        Route::get('/list', [ListUserController::class, 'listUser'])->name('listUser');
        Route::get('/delete', [DeleteUserController::class, 'deleteUser'])->name('deleteUser');
        Route::get('/edit', [EditUserController::class, 'editFormUser'])->name('editUser');
        Route::post('/edit', [EditUserController::class, 'editUser'])->name('editUser');
        Route::get('/add', [AddUserController::class, 'addFormUser'])->name('addUser');
        Route::post('/add', [AddUserController::class, 'addUser'])->name('addUser');
    });
    Route::group(['prefix' => 'voucher'], function (){
        Route::get('/list', [ListVoucherController::class, 'listVoucher'])->name('listVoucher');
        Route::get('/delete', [DeleteVoucherController::class, 'deleteVoucher'])->name('deleteVoucher');
        Route::get('/edit', [EditVoucherController::class, 'editFormVoucher'])->name('editVoucher');
        Route::post('/edit', [EditVoucherController::class, 'editVoucher'])->name('editVoucher');
        Route::get('/add', [AddVoucherController::class, 'addFormVoucher'])->name('addVoucher');
        Route::post('/add', [AddVoucherController::class, 'addVoucher'])->name('addVoucher');
    });
    Route::group(['prefix' => 'transactions'], function (){
        Route::get('/list', [RechargeHistoryController::class, 'listRechargeHistory'])
             ->name('listRechargeHistory');
    });
    Route::group(['prefix' => 'posts'], function (){
        Route::get('/list', [ListPostsController::class, 'listPosts'])->name('listPosts');
        Route::get('/delete', [DeletePostsController::class, 'deletePosts'])->name('deletePosts');
        Route::get('/edit', [EditPostsController::class, 'editFormPosts'])->name('editPosts');
        Route::post('/edit', [EditPostsController::class, 'editPosts'])->name('editPosts');
        Route::get('/add', [AddPostsController::class, 'addFormPosts'])->name('addPosts');
        Route::post('/add', [AddPostsController::class, 'addPosts'])->name('addPosts');
    });
});


Route::group(['prefix' => '/'], function (){
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::get('signup', [SignUpController::class, 'signup'])->name('signup');
    Route::get('account', [AccountController::class, 'account'])->name('account');
    Route::get('foget-password', [FogetPasswordController::class, 'fogetPassword'])->name('fogetPassword');
    Route::get('about', [AboutController::class, 'about'])->name('about');
    Route::group(['prefix' => 'blog'], function (){
        Route::get('/list', [BlogListController::class, 'listBlog'])->name('listBlog');
        Route::get('/single', [PostSingleController::class, 'postSingle'])->name('postSingle');
    });
    Route::group(['prefix' => 'post'], function (){
        Route::get('/add', [AddPostController::class, 'post'])->name('postAdd');
        Route::get('/new', [PostNewController::class, 'postNew'])->name('postNew');
        Route::get('/vip', [PostNewController::class, 'postList'])->name('postList');
        Route::get('/delete',[PostNewController::class, 'postDelete'])->name('postDelete');
        Route::get('/list', [PostListController::class, 'listPost'])->name('listPost');
    });
    Route::group(['prefix' => 'search'], function (){
        Route::get('/list', [SearchController::class, 'search'])->name('search');
    });
    Route::group(['prefix' => 'contact'], function (){
        Route::get('/list', [ContactController::class, 'contact'])->name('contact');
    });
    Route::group(['prefix' => 'docs'], function (){
        Route::get('/terms',  [DocsController::class, 'docsterms'])->name('terms');
        Route::get('/policy', [DocsController::class, 'docspolicy'])->name('policy');
    });

});





