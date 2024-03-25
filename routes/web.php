<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::get('/',[IndexController::class,'Index'])->name('home');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


//User Routes//
    //Protected Routes
        Route::middleware('auth')->group(function () {
            Route::get('/dashboard',[UserController::class,'UserDashboard'])->name('dashboard');
            Route::post('/user/profile/store',[UserController::class,'UserProfileStore'])->name('user.profile.store');
            Route::get('/user/logout',[UserController::class,'UserLogout'])->name('user.logout');
            Route::get('/user/change/password',[UserController::class,'UserChangePassword'])->name('user.change.password');
            Route::post('/user/update/password',[UserController::class,'UserUpdatePassword'])->name('user.update.password');
        });

require __DIR__.'/auth.php';

//Admin Routes//
    //Protected Routes
        Route::middleware(['auth', 'role:admin'])->group(function () {
            //Admin Dashboard and Admin Profile Routes
            Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
            Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
            Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
            Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
            Route::get('/admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
            Route::post('/admin/update/password',[AdminController::class,'AdminUpdatePassword'])->name('admin.update.password');


            //Admin Manage Category Routes
            Route::controller(CategoryController::class)->group(function(){
                Route::get('/all/category','AllCategory')->name('all.category');
                Route::get('/add/category','AddCategory')->name('add.category');
                Route::post('/store/category','StoreCategory')->name('store.category');
                Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
                Route::post('/update/category','UpdateCategory')->name('update.category');
                Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');
            });

            //Admin Manage SubCategory Routes
            Route::controller(CategoryController::class)->group(function(){
                Route::get('/all/subcategory','AllSubCategory')->name('all.subcategory');
                Route::get('/add/subcategory','AddSubCategory')->name('add.subcategory');
                Route::post('/store/subcategory','StoreSubCategory')->name('store.subcategory');
                Route::get('/edit/subcategory/{id}','EditSubCategory')->name('edit.subcategory');
                Route::post('/update/subcategory','UpdateSubCategory')->name('update.subcategory');
                Route::get('/delete/subcategory/{id}','DeleteSubCategory')->name('delete.subcategory');
                Route::get('/subcategory/ajax/{category_id}','GetSubCategory');
            });

            //Admin Manage Users Routes
            Route::controller(AdminController::class)->group(function(){
                Route::get('/all/admins','AllAdmins')->name('all.admins');
                Route::get('/add/admin','AddAdmin')->name('add.admin');
                Route::post('/store/admin','StoreAdmin')->name('store.admin');
                Route::get('/edit/admin/{id}','EditAdmin')->name('edit.admin');
                Route::post('/update/admin','UpdateAdmin')->name('update.admin');
                Route::get('/delete/admin/{id}','DeleteAdmin')->name('delete.admin');
                Route::get('/inactive/admin/user/{id}','InactiveAdminUser')->name('inactive.admin.user');
                Route::get('/active/admin/user/{id}','ActiveAdminUser')->name('active.admin.user');
            });

            //Admin Manage News Routes
            Route::controller(NewsPostController::class)->group(function(){
                Route::get('/all/newsposts','AllNewsPosts')->name('all.newsposts');
                Route::get('/add/newspost','AddNewsPost')->name('add.newspost');
                Route::post('/store/newspost','StoreNewsPost')->name('store.newspost');
                Route::get('/edit/newspost/{id}','EditNewsPost')->name('edit.newspost');
                Route::post('/update/newspost','UpdateNewsPost')->name('update.newspost');
                Route::get('/delete/newspost/{id}','DeleteNewsPost')->name('delete.newspost');
                Route::get('/deactivate/newspost/{id}','DeactivateNewsPost')->name('deactivate.newspost');
                Route::get('/activate/newspost/{id}','ActivateNewsPost')->name('activate.newspost');

            });

        });
    //Public Routes
    Route::get('/admin/login',[AdminController::class,'AdminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');
    Route::get('/admin/logout/page',[AdminController::class,'AdminLogoutPage'])->name('admin.logout.page');

