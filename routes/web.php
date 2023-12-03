<?php

use Illuminate\Support\Facades\Route;

// ++++ CAC TRANG THUOC ADMIN ++++
// danh mục
use App\Http\Controllers\Admin\Category\AddCategoryController;
use App\Http\Controllers\Admin\Category\DeleteCategoryController;
use App\Http\Controllers\Admin\Category\EditCategoryController;
use App\Http\Controllers\Admin\Category\ListCategoryController;

// liên hệ
use App\Http\Controllers\Admin\Contact\AddContactController;
use App\Http\Controllers\Admin\Contact\DeleteContactController;
use App\Http\Controllers\Admin\Contact\ListContactController;

// thống kê
use App\Http\Controllers\Admin\Dashboard\ViewDashboardController;

// nhu cầu
use App\Http\Controllers\Admin\Demand\AddDemandController;
use App\Http\Controllers\Admin\Demand\DeleteDemandController;
use App\Http\Controllers\Admin\Demand\EditDemandController;
use App\Http\Controllers\Admin\Demand\ListDemandController;

// nhận email mới
use App\Http\Controllers\Admin\EmailNew\AddEmaiController;
use App\Http\Controllers\Admin\EmailNew\DeleteEmailController;
use App\Http\Controllers\Admin\EmailNew\InteractionCountCotroller;
use App\Http\Controllers\Admin\EmailNew\ListEmailController;

// bài viết
use App\Http\Controllers\Admin\Posts\AddPostsController;
use App\Http\Controllers\Admin\Posts\DeletePostsController;
use App\Http\Controllers\Admin\Posts\EditPostsController;
use App\Http\Controllers\Admin\Posts\ListPostsController;

// báo cáo
use App\Http\Controllers\Admin\Report\AddReportController;
use App\Http\Controllers\Admin\Report\DeleteReportController;
use App\Http\Controllers\Admin\Report\ListReportController;

// lịch sử giao dịch
use App\Http\Controllers\Admin\Transactions\RechargeHistoryController;

// tài khoản
use App\Http\Controllers\Admin\User\AddUserController;
use App\Http\Controllers\Admin\User\DeleteUserController;
use App\Http\Controllers\Admin\User\EditUserController;
use App\Http\Controllers\Admin\User\ListUserController;
use App\Http\Controllers\Client\Account\ProfileCotroller;

// voucher
use App\Http\Controllers\Admin\Voucher\AddVoucherController;
use App\Http\Controllers\Admin\Voucher\DeleteVoucherController;
use App\Http\Controllers\Admin\Voucher\EditVoucherController;
use App\Http\Controllers\Admin\Voucher\ListVoucherController;

// danh mục tin tức
use App\Http\Controllers\Admin\CategoryBlog\ListCategoryBlog;
use App\Http\Controllers\Admin\CategoryBlog\AddCategoryBlog;
use App\Http\Controllers\Admin\CategoryBlog\EditCategoryBlog;
use App\Http\Controllers\Admin\CategoryBlog\DeleteCategoryBlogController;

// tin tức
use App\Http\Controllers\Admin\Blog\ListBlogController;
use App\Http\Controllers\Admin\Blog\AddBlogController;
use App\Http\Controllers\Admin\Blog\EditBlogController;
use App\Http\Controllers\Admin\Blog\DeleteBlogController;

// ++++ CAC TRANG THUOC CLIENT ++++
use App\Http\Controllers\Client\Index\IndexController;

//trang bao loi
use App\Http\Controllers\Client\ErrorPage\ErrorPageController;

// dieu khoan
use App\Http\Controllers\Client\Docs\DocsController;

// gioi thieu
use App\Http\Controllers\Client\About\AboutController;

// tai khoan
use App\Http\Controllers\Client\Account\AccountController;
use App\Http\Controllers\Client\Account\ForgetPasswordController;
use App\Http\Controllers\Client\Account\GoogleController;
use App\Http\Controllers\Client\Account\LoginController;
use App\Http\Controllers\Client\Account\RegisterController;

// chi tiet tin
use App\Http\Controllers\Client\Blog\BlogListController;
use App\Http\Controllers\Client\Blog\PostSingleController;

// thanh toán
use App\Http\Controllers\Client\Pay\BuyArticleController;
use App\Http\Controllers\Client\Pay\PaypalController;
use App\Http\Controllers\Client\Pay\RechargeController;

// bài viết
use App\Http\Controllers\Client\Post\AddPostController;
use App\Http\Controllers\Client\Post\DeletePostController;
use App\Http\Controllers\Client\Post\EditPostController;
use App\Http\Controllers\Client\Post\PostListController;
use App\Http\Controllers\Client\Post\PostNewController;

// tìm kiếm
use App\Http\Controllers\Client\Search\SearchController;

// tool
use App\Http\Controllers\Client\Tools\CalculateController;
use App\Http\Controllers\Client\Tools\DesignCostsController;
use App\Http\Controllers\Client\Tools\MapLocationController;
use App\Http\Controllers\Client\Tools\BuildController;

//bai viet wp
use App\Http\Controllers\Client\Blog\BlogSingleController;

Route::group(['prefix' => 'admin', 'middleware' => ['AdminLogin']], function (){

    Route::get('/', [ViewDashboardController::class, 'dashboar'])->name('dashboar');
    Route::group(['prefix' => 'nhu-cau'], function (){
        Route::get('/danh-sach', [ListDemandController::class, 'listDemand'])->name('listDemand');
        Route::get('/xoa/{slug}', [DeleteDemandController::class, 'deleteDemand'])
             ->name('deleteDemand');
        Route::get('/khoi-phuc/{slug}', [DeleteDemandController::class, 'restoreDemand'])
             ->name('restoreDemand');
        Route::get('/lich-su-xoa-nhu-cau', [ListDemandController::class, 'listHistoryDemand'])
             ->name('listHistoryDemand');
        Route::get('/chinh-sua/{slug}', [EditDemandController::class, 'editFormDemand'])
             ->name('editDemand');
        Route::post('/chinh-sua/{slug}', [EditDemandController::class, 'editDemand'])
             ->name('editDemand');
        Route::get('/them', [AddDemandController::class, 'addFormDemand'])->name('addDemand');
        Route::post('/them', [AddDemandController::class, 'addDemand'])->name('addDemand');
        Route::post('/', [ListDemandController::class, 'searchDemand'])->name('searchDemand');
    });
    Route::group(['prefix' => 'danh-muc'], function (){
        Route::get('/danh-sach', [ListCategoryController::class, 'listCategory'])
             ->name('listCategory');
        Route::get('/xoa/{slug}', [DeleteCategoryController::class, 'deleteCategory'])
             ->name('deleteCategory');
        Route::get('/khoi-phuc/{slug}', [DeleteCategoryController::class, 'restoreCategory'])
             ->name('restoreCategory');
        Route::get('/lich-su-xoa-danh-muc', [ListCategoryController::class, 'listHistoryCategory'])
             ->name('listHistoryCategory');
        Route::get('/chinh-sua/{slug}', [EditCategoryController::class, 'editFormCategory'])
             ->name('editCategory');
        Route::post('/chinh-sua/{slug}', [EditCategoryController::class, 'editCategory'])
             ->name('editCategory');
        Route::get('/them', [AddCategoryController::class, 'addFormCategory'])->name('addCategory');
        Route::post('/them', [AddCategoryController::class, 'addCategory'])->name('addCategory');
        Route::post('/', [ListCategoryController::class, 'SearchCategory'])->name('SearchCategory');
    });
    Route::group(['prefix' => 'lien-he', 'middleware' => ['Roles']], function (){

        Route::get('/danh-sach-lien-he', [ListContactController::class, 'listContact'])
             ->name('listContact');
        Route::get('/xoa-lien-he/{id}', [DeleteContactController::class, 'deleteContact'])
             ->name('deleteContact');
        Route::get('/khoi-phuc/{id}', [DeleteContactController::class, 'restoreContact'])
             ->name('restoreContact');
        Route::get('/lich-su-xoa-tai-khoan/{id}', [DeleteUserController::class, 'userHistory'])
             ->name('userHistory');
        Route::get('/trang-thai-lien-he/{id}', [ListContactController::class, 'statusContact'])
             ->name('statusContact');
        Route::get('/danh-sach-xoa-lien-he', [ListContactController::class, 'listDeleteContact'])
             ->name('listDeleteContact');
        Route::get('/lich-su-xoa-tai-khoan/{id}', [DeleteUserController::class, 'userHistory'])
             ->name('userHistory');
        Route::get('/trang-thai-lien-he/{id}', [ListContactController::class, 'statusContact'])
             ->name('statusContact');
        Route::post('/tim-kiem-lien-he', [ListContactController::class, 'SearchContact'])
             ->name('SearchContact');
    });

    Route::group(['prefix' => 'nguoi-dung', 'middleware' => ['Roles']], function (){
        Route::get('/danh-sach', [ListUserController::class, 'listUser'])->name('listUser');
        Route::get('/danh-sach-xoa-tai-khoan', [ListUserController::class, 'ListUserHistory'])
             ->name('ListUserHistory');
        Route::get('cap-nhat-trang-thai/{id}', [ListUserController::class, 'statusUser'])
             ->name('statusUser');
        Route::get('/chinh-sua/{id}', [EditUserController::class, 'editFormUser'])
             ->name('editFormUser');
        Route::post('/chinh-sua/{id}', [EditUserController::class, 'editUser'])->name('editUser');
        Route::get('/them', [AddUserController::class, 'addFormUser'])->name('addUserForm');
        Route::post('/them', [AddUserController::class, 'formAddUser'])->name('addUser');
        Route::get('/xoa/{id}', [DeleteUserController::class, 'deleteUser'])->name('deleteUser');
        Route::get('/khoi-phuc-tai-khoan/{id}', [DeleteUserController::class, 'userRestore'])
             ->name('userRestore');
        Route::get('/tim-kiem-tai-khoan', [ListUserController::class, 'searchUser'])
             ->name('searchUser');

    });

    Route::group(['prefix' => 'ma-giam-gia'], function (){
        Route::get('/danh-sach', [ListVoucherController::class, 'listVoucher'])
             ->name('listVoucher');
        Route::get('trang-thai-ma-giam-gia/{id}', [ListVoucherController::class, 'status'])
             ->name('status');
        Route::get('/danh-sach-xoa-ma-giam-gia', [ListVoucherController::class, 'ListVoucherHistory'])
             ->name('ListVoucherHistory');
        Route::get('/tim-ma-giam-gia', [ListVoucherController::class, 'searchVoucher'])
             ->name('searchVoucher');
        Route::get('/chinh-sua/{slug}', [EditVoucherController::class, 'editFormVoucher'])
             ->name('editFormVoucher');
        Route::post('/chinh-sua/{slug}', [EditVoucherController::class, 'editVoucher'])
             ->name('editVoucher');
        Route::get('/them', [AddVoucherController::class, 'addFormVoucher'])
             ->name('addFormVoucher');
        Route::post('/them', [AddVoucherController::class, 'addVoucher'])->name('addVoucher');
        Route::get('/xoa/{slug}', [DeleteVoucherController::class, 'deleteVoucher'])
             ->name('deleteVoucher');
        Route::get('/khoi-phuc-ma-giam-gia/{slug}', [DeleteVoucherController::class, 'VoucherRestor'])
             ->name('VoucherRestor');
    });
    Route::group(['prefix' => 'lich-su-giao-dich', 'middleware' => ['Roles']], function (){
        Route::get('/danh-sach', [RechargeHistoryController::class, 'listRechargeHistory'])
             ->name('listRechargeHistory');
        Route::post('/', [RechargeHistoryController::class, 'searchListRechargeHistory'])
             ->name('searchListRechargeHistory');
    });
    Route::group(['prefix' => 'bai-viet'], function (){
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
        Route::get('/lich-su-xoa-bai-viet/{slug}', [DeletePostsController::class, 'deleteHistory'])
             ->name('deleteHistory');
        Route::get('/khoi-phuc-bai-viet/{slug}', [DeletePostsController::class, 'restorePost'])
             ->name('restorePost');
        Route::post('/', [ListPostsController::class, 'searchListPost'])->name('searchListPost');
        Route::post('/danh-sach-history', [ListPostsController::class, 'searchHisPost'])
             ->name('searchHisPost');
    });


    Route::group(['prefix' => 'quan-ly-bao-cao', 'middleware' => ['Roles']], function (){
        Route::get('/danh-sach-bao-cao', [ListReportController::class, 'ListReport'])
             ->name('ListReport');
        Route::get('/lich-su-bao-cao', [ListReportController::class, 'reportHistory'])
             ->name('reportHistory');
        Route::get('/trang-thai-bao-cao/{id}', [ListReportController::class, 'statusReport'])
             ->name('statusReport');
        Route::get('/tim-kiem-bao-cao', [ListReportController::class, 'searchReport'])
             ->name('searchReport');
        Route::get('/xoa-bao-cao/{id}', [DeleteReportController::class, 'deleteReport'])
             ->name('deleteReport');
        Route::get('/khoi-phuc-bao-cao/{id}', [DeleteReportController::class, 'restoreReport'])
             ->name('restoreReport');

    });

    Route::group(['prefix' => 'danh-muc-tin'], function (){
        Route::get('/danh-sach', [ListCategoryBlog::class, 'listCategoryBlog'])->name('listCategoryBlog');
        Route::get('/lich-su-xoa-danh-muc-tin-tuc', [ListCategoryBlog::class, 'listHistoryCategoryBlog'])
             ->name('listHistoryCategoryBlog');
        Route::get('/them', [AddCategoryBlog::class, 'addFormCategoryBlog'])->name('addFormCategoryBlog');
        Route::post('/them', [AddCategoryBlog::class, 'addCategoryBlog'])->name('addCategoryBlog');
        Route::get('/sua/{slug}', [EditCategoryBlog::class, 'editFormCategoryBlog'])->name('editFormCategoryBlog');
        Route::post('/cap-nhat/{slug}', [EditCategoryBlog::class, 'editCategoryBlog'])->name('editCategoryBlog');
        Route::post('tim-kiem/', [ListCategoryBlog::class, 'SearchCategoryBlog'])->name('SearchCategoryBlog');
        Route::get('xoa/{slug}', [DeleteCategoryBlogController::class, 'DeleteCategoryBlog'])->name('DeleteCategoryBlog');
        Route::get('khoi-phuc/{slug}', [DeleteCategoryBlogController::class, 'restoreCategoryBlog'])->name('restoreCategoryBlog');
    });

    Route::group(['prefix' => 'tin-tuc'], function (){
        Route::get('/danh-sach-tin-tuc', [ListBlogController::class, 'listBlog'])->name('listBlogAdmin');
        Route::get('/lich-su-xoa-tin-tuc', [ListBlogController::class, 'listHistoryBlog'])->name('listHistoryBlog');
        Route::get('/them', [AddBlogController::class, 'addFormBlog'])->name('addFormBlog');
        Route::post('/them', [AddBlogController::class, 'addBlog'])->name('addBlog');
        Route::get('/sua/{slug}', [EditBlogController::class, 'editFormBlog'])->name('editFormBlog');
        Route::post('/sua/{slug}', [EditBlogController::class, 'editBlog'])->name('editBlog');
        Route::post('tim-kiem/', [ListBlogController::class, 'SearchBlog'])->name('SearchBlogs');
        Route::get('/xoa/{slug}', [DeleteBlogController::class, 'deleteBlog'])->name('deleteBlog');
        Route::get('/khoi-phuc/{slug}', [DeleteBlogController::class, 'restoreBlog'])->name('restoreBlog');
    });
});
Route::group(['prefix' => '/', 'middleware' => ['Logout']], function (){
    Route::get('/theo-doi/', [ProfileCotroller::class, 'follow'])->name('follow');
    Route::get('/bo-theo-doi/', [ProfileCotroller::class, 'unFollow'])->name('unFollow');
    Route::get('dang-xuat', [LoginController::class, 'logout'])->name('logout');

});
Route::group(['prefix' => '/', 'middleware' => ['checkLogin']], function (){
    Route::get('/google', [GoogleController::class, 'loginUsingGoogle'])->name('loginGoogle');
    Route::get('/google/callback', [GoogleController::class, 'callbackFromGoogle'])
         ->name('callBackGoogle');
    Route::get('dang-nhap', [LoginController::class, 'login'])->name('login');
    Route::get('/checkPost', [LoginController::class, 'checkPost'])->name('checkPost');
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
    Route::get('/danh-sach-dang-tin', [PostNewController::class, 'listPost'])->name('postNew');


    Route::group(['prefix' => 'nap-tien'], function (){

        Route::post('/thanh-toan', [RechargeController::class, 'PaymentMethod'])
             ->name('Payment_method');
        Route::get('/vnpay-thanh-cong', [RechargeController::class, 'vnpaySuccess'])
             ->name('vnpay-success');
        //paypal
        Route::get('/thanh-toan-paypal-thanh-cong', [PaypalController::class, 'paypalSuccess'])
             ->name('paypal_success');
        Route::get('/thanh-toan-paypal-that-bai', [PaypalController::class, 'paypalCanel'])
             ->name('paypal_canel');
    });


    Route::post('/bao-cao', [AddReportController::class, 'addReport'])->name('addReport');


    Route::group(['prefix' => 'mua-tin-vip'], function (){
        Route::get('/kiem-tra-vi/{slug}', [BuyArticleController::class, 'buyVipNew'])
             ->name('buyVipNew');
        Route::get('/su-dung-voucher', [BuyArticleController::class, 'voucher'])->name('voucher');
        Route::get('/thanh-toan-hoa-don', [BuyArticleController::class, 'checkOut'])
             ->name('checkOut');


    });
    Route::get('/tai-khoan', [AccountController::class, 'account'])->name('account');
    Route::post('/sua-tai-khoan/{slug}', [AccountController::class, 'updateProfile'])
         ->name('updateProfile');
    Route::post('/doi-mat-khau/{token}', [AccountController::class, 'updatePassword'])
         ->name('updatePassword');
    Route::post('trang-thai/{slug}', [PostNewController::class, 'status'])->name('editStatus');


    Route::group(['prefix' => 'bai-viet'], function (){
        Route::get('/danh-sach-tin-da-dang', [PostNewController::class, 'postNew'])
             ->name('postNew');
        Route::get('/them', [AddPostController::class, 'post'])->name('postAdd');
        Route::post('/them', [AddPostController::class, 'addClientPosts'])->name('addClientPosts');
        Route::get('/danh-sach-dang-tin', [PostListController::class, 'listPost'])
             ->name('listPost');
        Route::get('/sua-tin/{slug}', [EditPostController::class, 'editPostsClient'])
             ->name('editPostsClient');
        Route::post('/sua-tin/{slug}', [EditPostController::class, 'storePostsClient'])
             ->name('storePostsClient');
        Route::get('/hinh-anh/{id}', [EditPostController::class, 'deleteMedia'])
             ->name('deleteMedia');

        Route::get('/xoa-dang-tin/{slug}', [DeletePostController::class, 'deletePostlist'])
             ->name('deletePostlist');
    });

});

Route::group(['prefix' => '/'], function (){


    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/tuong-tac/{slug}',
        [InteractionCountCotroller::class, 'interactionCount'])->name('interactionCount');

    //tools map
    Route::get('/vi-tri-bat-dong-san', [MapLocationController::class, 'mapLocation'])
         ->name('mapLocation');
    Route::get('/ket-qua-vi-tri-bds/', [MapLocationController::class, 'checkMap'])
         ->name('checkMap');
    //tool thiet ke
    Route::get('/tinh-chi-phi-thiet-ke', [DesignCostsController::class, 'designCost'])
         ->name('designCost');
    // tool xay dung
    Route::get('/tinh-chi-phi-xay-dung', [BuildController::class, 'index'])->name('buildCost');
    //tool lai suat
    Route::get('/reset-tools', [CalculateController::class, 'resetTool'])
         ->name('resetTool');
    Route::get('/tinh-lai-xuat', [CalculateController::class, 'index'])->name('viewCalculate');
    Route::get('/ket-qua/', [CalculateController::class, 'calculate'])->name('calculate');
    //404
    Route::get('bao-loi', [ErrorPageController::class, 'error'])->name('error');
    // chi tiet tai khoan dang bai viet
    Route::get('/thong-tin/{slug}', [ProfileCotroller::class, 'Profile'])->name('Profile');


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
        Route::get('/', [PostListController::class, 'SearchPost'])->name('SearchPost');
    });

    Route::group(['prefix' => 'tai-lieu'], function (){
        Route::get('/dieu-khoan', [DocsController::class, 'docsterms'])->name('terms');
        Route::get('/chinh-sach', [DocsController::class, 'docspolicy'])->name('policy');
    });

    Route::group(['prefix' => 'dang-ky-nhan-bai-viet'], function (){
        Route::get('/danh-sach-dang-ky', [ListEmailController::class, 'listEmail'])
             ->name('listEmail');
        Route::post('them-dang-ky', [AddEmaiController::class, 'emailFrom'])->name('emailForm');
        Route::get('/xoa-email-nhan-tin/{id}', [DeleteEmailController::class, 'deleteEmail'])
             ->name('deleteEmail');
        Route::get('/danh-sach-xoa-email', [ListEmailController::class, 'listDeleteEmail'])
             ->name('listDeleteEmail');
        Route::get('/khoi-phuc-email/{id}', [ListEmailController::class, 'restoreEmail'])
             ->name('restoreEmail');
        Route::post('/tim-kiem-email', [ListEmailController::class, 'SearchEmail'])
             ->name('SearchEmail');
    });

    Route::group(['prefix' => 'tin-tuc'], function (){
        Route::get('/danh-sach', [BlogListController::class, 'listBlog'])->name('listBlog');
        Route::get('/{slug}', [BlogSingleController::class, 'SingleBlog'])->name('SingleBlog');
        Route::get('/tim-kiem', [BlogListController::class, 'SearchBlog'])->name('SearchBlog');
    });

});
