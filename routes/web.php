<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\SeoDetailsController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Frontend\ReviewController;

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::get('/',[IndexController::class,'Index'])->name('home')->middleware('translate');


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

            //Admin Manage Banners Routes
            Route::controller(BannerController::class)->group(function(){
                Route::get('/all/banners','AllBanners')->name('all.banners');
                Route::post('/update/banners','UpdateBanners')->name('update.banners');
            });

            //Admin Manage Photos Gallery Routes
            Route::controller(GalleryController::class)->group(function(){
                Route::get('/all/photos','Allphotos')->name('all.photos');
                Route::get('/add/photos','Addphotos')->name('add.photos');
                Route::post('/store/photos','Storephotos')->name('store.photos');
                Route::get('/edit/photo/{id}','Editphoto')->name('edit.photo');
                Route::post('/update/photo','Updatephoto')->name('update.photo');
                Route::get('/delete/photo/{id}','Deletephoto')->name('delete.photo');
            });

            //Admin Manage Videos Gallery & Live TV Details Routes
            Route::controller(GalleryController::class)->group(function(){
                Route::get('/all/video','Allvideos')->name('all.videos');
                Route::get('/add/video','Addvideo')->name('add.video');
                Route::post('/store/video','Storevideo')->name('store.video');
                Route::get('/edit/video/{id}','Editvideo')->name('edit.video');
                Route::post('/update/video','Updatevideo')->name('update.video');
                Route::get('/delete/video/{id}','Deletevideo')->name('delete.video');

                //Live TV Details Routes
                Route::get('/edit/live','Editlive')->name('edit.live');
                Route::post('/update/live','Updatelive')->name('update.live');

            });

            //Admin Manage Review Routes
            Route::controller(ReviewController::class)->group(function(){
                Route::get('/all/reviews','AllReviews')->name('all.reviews');
                Route::get('/pending/reviews','PendingReviews')->name('pending.reviews');
                Route::get('/approve/review/{id}','ApproveReview')->name('approve.review');
                Route::get('/reject/review/{id}','RejectReview')->name('reject.review');
                Route::get('/delete/review/{id}','DeleteReview')->name('delete.review');
            });

            //Admin Manage SEO Routes
            Route::controller(SeoDetailsController::class)->group(function(){
                Route::post('/update/seo','UpdateSeo')->name('update.seo');
                Route::get('/seo/details','SeoDetails')->name('seo.details');
            });

        });
    //Public Routes
    Route::get('/admin/login',[AdminController::class,'AdminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');
    Route::get('/admin/logout/page',[AdminController::class,'AdminLogoutPage'])->name('admin.logout.page');

    Route::get('newsdetails/{id}/{slug}',[IndexController::class,'NewsDetails']);
    Route::get('/news/{type}/{id}/{slug}', [IndexController::class, 'CategoryNews']);
    Route::get('/change/language',[IndexController::class,'Change'])->name('change.language');

    Route::post('/search', [IndexController::class, 'SearchByDate'])->name('search-by-date');

    Route::post('/store/review', [ReviewController::class, 'StoreReview'])->name('store.review');

    Route::post('/news/search', [IndexController::class, 'NewsSearch'])->name('search.news');

    Route::get('reporter/news/{id}',[IndexController::class,'ReporterNews'])->name('reporter.news');

