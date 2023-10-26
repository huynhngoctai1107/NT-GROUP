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
use App\Http\Controllers\Admin\Posts\AddPostsController;
use App\Http\Controllers\Admin\Posts\DeletePostsController;
use App\Http\Controllers\Admin\Posts\EditPostsController;
use App\Http\Controllers\Admin\Posts\ListPostsController;
use App\Http\Controllers\Admin\Transactions\RechargeHistoryController;
use App\Http\Controllers\Admin\User\AddUserController;
use App\Http\Controllers\Admin\User\DeleteUserController;
use App\Http\Controllers\Admin\User\EditUserController;
use App\Http\Controllers\Admin\User\ListUserController;
use App\Http\Controllers\Client\Account\GoogleController;

//admin
use App\Http\Controllers\Admin\Voucher\AddVoucherController;
use App\Http\Controllers\Admin\Voucher\DeleteVoucherController;
use App\Http\Controllers\Admin\Voucher\EditVoucherController;
use App\Http\Controllers\Admin\Voucher\ListVoucherController;
use App\Http\Controllers\Client\About\AboutController;
use App\Http\Controllers\Client\Account\AccountController;
use App\Http\Controllers\Client\Account\ForgetPasswordController;
use App\Http\Controllers\Client\Account\LoginController;
use App\Http\Controllers\Client\Account\RegisterController;
use App\Http\Controllers\Client\Blog\BlogListController;
use App\Http\Controllers\Client\Blog\PostSingleController;
use App\Http\Controllers\Admin\Contact\AddContactController;
use App\Http\Controllers\Admin\Contact\ListContactController;
use App\Http\Controllers\Admin\Contact\DeleteContactController;
use App\Http\Controllers\Client\Docs\DocsController;
use App\Http\Controllers\Client\ErrorPage\ErrorPageController;
use App\Http\Controllers\Client\Index\IndexController;
use App\Http\Controllers\Client\Post\AddPostController;
use App\Http\Controllers\Client\Post\PostListController;
use App\Http\Controllers\Client\Pay\RechargeController;
use App\Http\Controllers\Client\Post\DeletePostController;
use App\Http\Controllers\Client\Search\SearchController;
use App\Http\Controllers\Client\Post\PostNewController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['AdminLogin']], function (){
    Route::get('/', [ViewDashboardController::class, 'dashboar'])->name('dashboar');
    Route::group(['prefix' => 'nhu-cau'], function (){
        Route::get('/danh-sach', [ListDemandController::class, 'listDemand'])->name('listDemand');
        Route::get('/xoa/{slug}', [DeleteDemandController::class, 'deleteDemand'])
             ->name('deleteDemand');
        Route::get('/chinh-sua/{slug}', [EditDemandController::class, 'editFormDemand'])
             ->name('editDemand');
        Route::post('/chinh-sua/{slug}', [EditDemandController::class, 'editDemand'])
             ->name('editDemand');
        Route::get('/them', [AddDemandController::class, 'addFormDemand'])->name('addDemand');
        Route::post('/them', [AddDemandController::class, 'addDemand'])->name('addDemand');
    });
    Route::group(['prefix' => 'danh-muc'], function (){
        Route::get('/danh-sach', [ListCategoryController::class, 'listCategory'])
             ->name('listCategory');
        Route::get('/xoa/{slug}', [DeleteCategoryController::class, 'deleteCategory'])
             ->name('deleteCategory');
        Route::get('/chinh-sua/{slug}', [EditCategoryController::class, 'editFormCategory'])
             ->name('editCategory');
        Route::post('/chinh-sua/{slug}', [EditCategoryController::class, 'editCategory'])
             ->name('editCategory');
        Route::get('/them', [AddCategoryController::class, 'addFormCategory'])->name('addCategory');
        Route::post('/them', [AddCategoryController::class, 'addCategory'])->name('addCategory');
    });
    Route::group(['prefix' => 'lien-he'], function (){
        Route::get('/danh-sach-lien-he', [ListContactController::class, 'listContact'])
             ->name('listContact');
        Route::get('/xoa-lien-he/{id}', [DeleteContactController::class, 'deleteContact'])
             ->name('deleteContact');
    });

    Route::group(['prefix' => 'nguoi-dung', 'middleware' => ['Roles']], function (){
        Route::get('/danh-sach', [ListUserController::class, 'listUser'])->name('listUser');
        Route::get('/chinh-sua/{id}', [EditUserController::class, 'editFormUser'])
             ->name('editFormUser');
        Route::post('/chinh-sua/{id}', [EditUserController::class, 'editUser'])->name('editUser');
        Route::get('/them', [AddUserController::class, 'addFormUser'])->name('addUserForm');
        Route::post('/them', [AddUserController::class, 'formAddUser'])->name('addUser');
        Route::get('/xoa/{id}', [DeleteUserController::class, 'deleteUser'])->name('deleteUser');
        Route::get('statusUser/{id}', [ListUserController::class, 'statusUser'])
             ->name('statusUser');
    });

    Route::group(['prefix' => 'voucher'], function (){
        Route::get('/danh-sach', [ListVoucherController::class, 'listVoucher'])
             ->name('listVoucher');
        Route::get('/xoa/{slug}', [DeleteVoucherController::class, 'deleteVoucher'])
             ->name('deleteVoucher');
        Route::get('/chinh-sua/{slug}', [EditVoucherController::class, 'editFormVoucher'])
             ->name('editFormVoucher');
        Route::post('/chinh-sua/{slug}', [EditVoucherController::class, 'editVoucher'])
             ->name('editVoucher');
        Route::get('/them', [AddVoucherController::class, 'addFormVoucher'])
             ->name('addFormVoucher');
        Route::post('/them', [AddVoucherController::class, 'addVoucher'])->name('addVoucher');
        Route::get('status/{id}', [ListVoucherController::class, 'status'])->name('status');
    });
    Route::group(['prefix' => 'lich-su-gia-dich', 'middleware' => ['Roles']], function (){
        Route::get('/danh-sach', [RechargeHistoryController::class, 'listRechargeHistory'])
             ->name('listRechargeHistory');
    });
    Route::group(['prefix' => 'posts'], function (){
        Route::get('/danh-sach', [ListPostsController::class, 'listPosts'])->name('listPosts');
        Route::get('/danh-sach-history', [ListPostsController::class, 'listHistory'])
             ->name('listHistory');
        Route::get('/xoa/{id}', [DeletePostsController::class, 'deletePosts'])->name('deletePosts');
        Route::get('/chinh-sua/{slug}', [EditPostsController::class, 'editFormPosts'])
             ->name('editPosts');
        Route::post('/chinh-sua/{slug}', [EditPostsController::class, 'editPosts'])
             ->name('editPosts');
        Route::get('/them', [AddPostsController::class, 'addFormPosts'])->name('addFormPosts');
        Route::post('/them', [AddPostsController::class, 'addPosts'])->name('addPosts');
        Route::get('/{id}', [ListPostsController::class, 'UpdateStatus'])->name('UpdateStatus');
        Route::get('/hinh-anh/{id}', [EditPostsController::class, 'deleteMedia'])
             ->name('deleteMedia');
        Route::get('/xoa-history/{slug}', [DeletePostsController::class, 'deleteHistory'])
             ->name('deleteHistory');
        Route::get('/restore/{slug}', [DeletePostsController::class, 'restorePost'])
             ->name('restorePost');
    });

});
Route::group(['prefix' => '/', 'middleware' => ['Logout']], function (){
    Route::get('dang-xuat', [LoginController::class, 'logout'])->name('logout');

});
Route::group(['prefix' => '/', 'middleware' => ['checkLogin']], function (){
    Route::get('/google', [GoogleController::class, 'loginUsingGoogle'])->name('loginGoogle');
    Route::get('/google/callback', [GoogleController::class, 'callbackFromGoogle'])
         ->name('callBackGoogle');
    Route::get('dang-nhap', [LoginController::class, 'login'])->name('login');
    Route::post('dang-nhap', [LoginController::class, 'loginForm'])->name('loginForm');
    Route::get('dang-ky', [RegisterController::class, 'register'])->name('register');
    Route::post('dang-ky', [RegisterController::class, 'registerFrom'])->name('registerFrom');
    Route::get('quen-mat-khau', [ForgetPasswordController::class, 'fogetPassword'])
         ->name('fogetPassword');
    Route::post('quen-mat-khau', [ForgetPasswordController::class, 'postForgetPassword'])
         ->name('postForgetPassword');
    Route::get('cap-nhat-lai-mat-khau/{token}', [ForgetPasswordController::class, 'resetPassword'])
         ->name('resetPassword');

    Route::post('cap-nhat-lai-mat-khau/{token}',
        [ForgetPasswordController::class, 'postResetPassword'])->name('postResetPassword');

});
Route::group(['prefix' => '/', 'middleware' => ['ClientLogin']], function (){


    Route::group(['prefix' => 'nap-tien'], function () {
        Route::get('/', [RechargeController::class, 'Recharge'])->name('recharge');
        Route::post('/', [RechargeController::class, 'Pay'])->name('pay');
        Route::post('/vnpay-payment', [RechargeController::class, 'vnpayPayment'])->name('vnpay-payment');
        Route::get('/vnpay-success', [RechargeController::class, 'vnpaySuccess'])->name('vnpay-success');
    });

        Route::get('/tai-khoan', [AccountController::class, 'account'])->name('account');
        Route::post('/sua-tai-khoan/{token}',[AccountController::class, 'updateProfile'])->name('updateProfile');
        Route::post('/doi-mat-khau/{token}',[AccountController::class, 'updatePassword'])->name('updatePassword');
        Route::post('trang-thai/{slug}', [PostNewController::class, 'status'])->name('editStatus');


    Route::group(['prefix' => 'bai-viet'], function (){
     Route::get('/danh-sach-tin-da-dang', [PostNewController::class, 'postNew'])->name('postNew');
    
        Route::get('/them', [AddPostController::class, 'post'])->name('postAdd');
        Route::post('/them', [AddPostController::class, 'addClientPosts'])->name('addClientPosts');
        Route::get('/danh-sach-dang-tin', [PostListController::class, 'listPost'])->name('listPost');
        Route::get('/xoa-dang-tin/{slug}', [DeletePostController::class, 'deletePostlist'])
             ->name('deletePostlist');
    });

});

Route::group(['prefix' => '/'], function (){

    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('bao-loi', [ErrorPageController::class, 'error'])->name('error');
    Route::get('kich-hoat/{token}', [RegisterController::class, 'active'])->name('active');
    Route::get('/chi-tiet-tin/{slug}', [PostSingleController::class, 'postSingle'])
         ->name('postSingle');
    Route::get('lien-he', [AddContactController::class, 'contact'])->name('contact');
    Route::post('lien-he', [AddContactController::class, 'contactFrom'])->name('contactFrom');

    Route::get('gioi-thieu', [AboutController::class, 'about'])->name('about');

    Route::group(['prefix' => 'tin-tuc'], function (){
        Route::get('/danh-sach', [BlogListController::class, 'listBlog'])->name('listBlog');
    });
    Route::group(['prefix' => 'tin'], function (){
        Route::get('/danh-sach-tin', [PostListController::class, 'listPost'])->name('listPost');
    });
    Route::group(['prefix' => 'tim-kiem'], function (){
        Route::get('/loai/danh-sach/{slug}', [SearchController::class, 'search'])->name('search');
        Route::get('/nhu-cau/danh-sach/{slug}', [SearchController::class, 'search1'])
             ->name('search1');
    });

    Route::group(['prefix' => 'tai-lieu'], function (){
        Route::get('/dieu-khoan', [DocsController::class, 'docsterms'])->name('terms');
        Route::get('/chinh-sach', [DocsController::class, 'docspolicy'])->name('policy');
    });

});