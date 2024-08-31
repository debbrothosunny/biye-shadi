<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\AdminAuth\AdminAuthController;
use App\Http\Controllers\UserAuth\UserAuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::get('/about', [FrontendController::class, 'about'])->name('about');


Route::get('/more_bio', [FrontendController::class, 'More_Bio'])->name('more_bio');

Route::get('/client', [FrontendController::class, 'client'])->name('client');


// Profile Page
Route::get('/profile_page/{id}', [FrontendController::class, 'profile_page'])->name('profile_page')->middleware('auth');



Route::get('/profile/{id}', [FrontendController::class, 'show'])->name('profile.show');



Route::get('/profile', [FrontendController::class, 'profile'])->name('profile');

Route::get('/payment_form', [FrontendController::class, 'PaymentForm'])->name('payment_form');




// Message Route
Route::get('/message', [FrontendController::class, 'message'])->name('message');

Route::post('/message', [FrontendController::class, 'Message_create'])->name('create.Message');
Route::get('Message/delete/{id}', [FrontendController::class, 'Message_delete'])->name('Message.delete');


// Subscribe Route
Route::get('/subscriber', [FrontendController::class, 'subs'])->name('subs');

Route::post('/subscriber', [FrontendController::class, 'subs_create'])->name('create.subs');
Route::get('subscriber/delete/{id}', [FrontendController::class, 'subs_delete'])->name('subs.delete');



Auth::routes(['verify' => true]);

// Register User Route
Route::prefix('/user')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/logout', [LoginController::class, 'UserLogOut'])->name('User.LogOut');
    Route::get('/dashboard', [UserAuthController::class, 'UserDashboard'])->name('user_dashboard');


    // Your Personal Data Route Frontend

    Route::get('/personal_data_form/{id}', [FrontendController::class, 'Personal_Data'])->name('personal_data_form');
    Route::post('/personal_data_form/create', [FrontendController::class, 'personal_data_form_create'])->name('personal_data_form.create');
    Route::post('/personal_data_form/update/{id}', [FrontendController::class, 'personal_data_form_update'])->name('personal_data_form.update');
    Route::get('/personal_data_form/delete/{id}', [FrontendController::class, 'personal_data_form_delete'])->name('personal_data_form.delete');


    // Edu Qualification Route Frontend
    Route::get('/edu_quali_form/{id}', [FrontendController::class, 'Edu_Quali'])->name('edu_quali_form');
    Route::post('/edu_quali_form/create', [FrontendController::class, 'edu_quali_form_create'])->name('edu_quali_form.create');
    Route::post('/edu_quali_form/update/{id}', [FrontendController::class, 'edu_quali_form_update'])->name('edu_quali_form.update');
    Route::get('/edu_quali_form/delete/{id}', [FrontendController::class, 'edu_quali_form_delete'])->name('edu_quali_form.delete');

    // Family Information Route Frontend
    Route::get('/family_information_form/{id}', [FrontendController::class, 'family_information_form'])->name('family_information_form');
    Route::post('/family_information_form/create', [FrontendController::class, 'family_information_form_create'])->name('family_information_form.create');
    Route::post('/family_information_form/update/{id}', [FrontendController::class, 'family_information_form_update'])->name('family_information_form.update');
    Route::get('/family_information_form/delete/{id}', [FrontendController::class, 'family_information_form_delete'])->name('family_information_form.delete');

    // Occupational Information Route Frontend

    Route::get('/ocu_info_form/{id}', [FrontendController::class, 'ocu_info_form'])->name('ocu_info_form');
    Route::post('/ocu_info_form/create', [FrontendController::class, 'ocu_info_form_create'])->name('ocu_info_form.create');
    Route::post('/ocu_info_form/update/{id}', [FrontendController::class, 'ocu_info_form_update'])->name('ocu_info_form.update');
    Route::get('/ocu_info_form/delete/{id}', [FrontendController::class, 'ocu_info_form_delete'])->name('ocu_info_form.delete');


    // Marriage Related Information Route Frontend

    Route::get('/marriage_related_form/{id}', [FrontendController::class, 'marriage_related_form'])->name('marriage_related_form');
    Route::post('/marriage_related_form/create', [FrontendController::class, 'marriage_related_form_create'])->name('marriage_related_form.create');
    Route::post('/marriage_related_form/update/{id}', [FrontendController::class, 'marriage_related_form_update'])->name('marriage_related_form.update');
    Route::get('/marriage_related_form/delete/{id}', [FrontendController::class, 'marriage_related_form_delete'])->name('marriage_related_form.delete');


    Route::get('/life_partner_form/{id}', [FrontendController::class, 'life_partner_form'])->name('life_partner_form');
    Route::post('/life_partner_form/create', [FrontendController::class, 'life_partner_form_create'])->name('life_partner_form.create');
    Route::post('/life_partner_form/update/{id}', [FrontendController::class, 'life_partner_form_update'])->name('life_partner_form.update');
    Route::get('/life_partner_form/delete/{id}', [FrontendController::class, 'life_partner_form_delete'])->name('life_partner_form.delete');
    // payment
    Route::post('/payment_create', [AdminController::class, 'payment_create'])->name('payment.create');

  
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'AdminLoginForm'])->name('AdminLoginForm');
    Route::post('/login-admin', [AdminController::class, 'AdminLogin'])->name('Admin.Login');
});
// Admin Route

Route::prefix('/admin')->middleware(['admin'])->group(function () {
    Route::get('/admin/logout', [AdminAuthController::class, 'AdminLogOut'])->name('Admin.LogOut');

    Route::get('/users/{userId}/change-to-free', [UserAuthController::class, 'changeToFree'])->name('users.changeToFree');
    Route::post('/update_status/{id}', [UserAuthController::class, 'updateStatus'])->name('update_status');

    Route::post('/user_register/update/{id}', [UserAuthController::class, 'user_Register_page_update'])->name('user_register_page_update.update');

    Route::get('/user_register/delete/{id}', [UserAuthController::class, 'user_Register_delete'])->name('user_register.delete');

    // payment
    Route::get('/payment', [AdminController::class, 'payment'])->name('payment');
    Route::get('/payment_accept/{id}', [AdminController::class, 'payment_accept'])->name('payment.accept');
    Route::get('/payment_cancel/{id}', [AdminController::class, 'payment_cancel'])->name('payment.cancel');
    
 




    

    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('Admin.dashboard');

    Route::prefix('home')->group(function () {
        /*****************Home Page*********************/
        Route::get('/', [AdminController::class, 'home'])->name('home');
    });

    Route::prefix('happy_client')->group(function () {
        /*****************Home Page*********************/
        Route::get('happy_client', [AdminController::class, 'happy_client'])->name('happy_client');
    });

    Route::prefix('about_us')->group(function () {
        /*****************Home Page*********************/
        Route::get('about_us', [AdminController::class, 'about_us'])->name('about_us');
    });

    Route::prefix('bio')->group(function () {
        /*****************Home Page*********************/
        Route::get('bio', [AdminController::class, 'bio'])->name('bio');
    });

    Route::prefix('site_setting')->group(function () {
        Route::get('/site_setting', [AdminController::class, 'site_setting'])->name('site_setting');

    });

    Route::prefix('country')->group(function () {

        Route::get('/country', [AdminController::class, 'country'])->name('country');
    });

    Route::prefix('city')->group(function () {

        Route::get('/city', [AdminController::class, 'city'])->name('city');
    });


    Route::prefix('upgradation')->group(function () {

        Route::get('/upgradation_fee', [AdminController::class, 'upgradation'])->name('upgradation_fee');
    });



    // Admin Profile Route 
    Route::get('/user/profile', [AdminAuthController::class, 'UserProfile'])->name('User.Profile');
    Route::get('/change/password', [AdminAuthController::class, 'ChangePassword'])->name('Change.Password');
    Route::post('/update/password', [AdminAuthController::class, 'UpdatePassword'])->name('Update.Password');





    ///////////////////////////////// All Common CRUD Route //////////////////////////////////
    ////////////////////////////////  ********************* //////////////////////////////////

    // Content With Image
    Route::post('/cw/img/create', [AdminController::class, 'cw_image_create'])->name('cw_image.create');
    Route::post('/cw/img/update/{id}', [AdminController::class, 'cw_image_update'])->name('cw_image.update');
    Route::get('/cw/img/delete/{id}', [AdminController::class, 'cw_image_delete'])->name('cw_image.delete');

    // All Title
    Route::post('/cw/title/create', [AdminController::class, 'cw_title_create'])->name('cw_title.create');
    Route::post('/cw/title/update/{id}', [AdminController::class, 'cw_title_update'])->name('cw_title.update');
    Route::get('/cw/title/delete/{id}', [AdminController::class, 'cw_title_delete'])->name('cw_title.delete');

    // clint_reviews
    Route::post('/clint_reviews/create', [AdminController::class, 'clint_reviews_create'])->name('clint_reviews.create');
    Route::post('/clint_reviews/update/{id}', [AdminController::class, 'clint_reviews_update'])->name('clint_reviews.update');
    Route::get('/clint_reviews/delete/{id}', [AdminController::class, 'clint_reviews_delete'])->name('clint_reviews.delete');

    // Sylheti Biye
    Route::post('/Sylheti_Biye/create', [AdminController::class, 'Sylheti_Biye_create'])->name('Sylheti_Biye.create');
    Route::post('/Sylheti_Biye/update/{id}', [AdminController::class, 'Sylheti_Biye_update'])->name('Sylheti_Biye.update');
    Route::get('/Sylheti_Biye/delete/{id}', [AdminController::class, 'Sylheti_Biye_delete'])->name('Sylheti_Biye.delete');

    //  review title
    Route::post('/review_title/create', [AdminController::class, 'review_title_create'])->name('review_title.create');
    Route::post('/review_title/update/{id}', [AdminController::class, 'review_title_update'])->name('review_title.update');
    Route::get('/review_title/delete/{id}', [AdminController::class, 'review_title_delete'])->name('review_title.delete');


    //  Country 
    Route::post('/country/create', [AdminController::class, 'country_create'])->name('country.create');
    Route::post('/country/update/{id}', [AdminController::class, 'country_update'])->name('country.update');
    Route::get('/country/delete/{id}', [AdminController::class, 'country_delete'])->name('country.delete');

    //  City 
    Route::post('/city/create', [AdminController::class, 'city_create'])->name('city.create');
    Route::post('/city/update/{id}', [AdminController::class, 'city_update'])->name('city.update');
    Route::get('/city/delete/{id}', [AdminController::class, 'city_delete'])->name('city.delete');

    //  Education

    Route::post('/education/create', [AdminController::class, 'education_create'])->name('education.create');
    Route::post('/education/update/{id}', [AdminController::class, 'education_update'])->name('education.update');
    Route::get('/education/delete/{id}', [AdminController::class, 'education_delete'])->name('education.delete');

    //  Profession

    Route::post('/profession/create', [AdminController::class, 'profession_create'])->name('profession.create');
    Route::post('/profession/update/{id}', [AdminController::class, 'profession_update'])->name('profession.update');
    Route::get('/profession/delete/{id}', [AdminController::class, 'profession_delete'])->name('profession.delete');


    //  Upgradation Fee Route

    Route::post('/upgradation_fee/create', [AdminController::class, 'upgradation_fee_create'])->name('upgradation_fee.create');
    Route::post('/upgradation_fee/update/{id}', [AdminController::class, 'upgradation_fee_update'])->name('upgradation_fee.update');
    Route::get('/upgradation_fee/delete/{id}', [AdminController::class, 'upgradation_fee_delete'])->name('upgradation_fee.delete');

    // Content With Video
    Route::post('/cw/video/create', [AdminController::class, 'cw_video_create'])->name('cw_video.create');
    Route::post('/cw/video/update/{id}', [AdminController::class, 'cw_video_update'])->name('cw_video.update');
    Route::get('/cw/video/delete/{id}', [AdminController::class, 'cw_video_delete'])->name('cw_video.delete');

    // Common banner
    Route::post('/common_banner/create', [AdminController::class, 'common_banner_create'])->name('common_banner.create');
    Route::post('/common_banner/update/{id}', [AdminController::class, 'common_banner_update'])->name('common_banner.update');
    Route::get('/common_banner/delete/{id}', [AdminController::class, 'common_banner_delete'])->name('common_banner.delete');

    // User Statistics
    Route::post('/cw/icon/create', [AdminController::class, 'cw_icon_create'])->name('cw_icon.create');
    Route::post('/cw/icon/update/{id}', [AdminController::class, 'cw_icon_update'])->name('cw_icon.update');
    Route::get('/cw/icon/delete/{id}', [AdminController::class, 'cw_icon_delete'])->name('cw_icon.delete');


    // User Register Page
    Route::get('/user_register_page', [UserAuthController::class, 'user_register_page'])->name('user_register_page');



    // Content With SEO
    Route::post('/seo/create', [AdminController::class, 'seo_create'])->name('seo.create');
    Route::post('/seo/update/{id}', [AdminController::class, 'seo_update'])->name('seo.update');
    Route::get('/seo/delete/{id}', [AdminController::class, 'seo_delete'])->name('seo.delete');


    //Site Setting Route 
    Route::post('/site_setting/create', [AdminController::class, 'site_setting_create'])->name('site_setting.create');
    Route::post('/site_setting/update/{id}', [AdminController::class, 'site_setting_update'])->name('site_setting.update');
    Route::get('/site_setting/delete/{id}', [AdminController::class, 'site_setting_delete'])->name('site_setting.delete');

});
