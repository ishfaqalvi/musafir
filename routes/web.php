<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Auth;

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

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

// Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Public Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {
    /*
	|--------------------------------------------------------------------------
	| Home Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(HomeController::class)->as('home.')->group(function () {
        Route::get('/',             'index')->name('index');
        Route::get('data',          'data' )->name('data' );
    });

    /*
	|--------------------------------------------------------------------------
	| Plans Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(PlanController::class)->prefix('plans')->as('plans.')->group(function () {
        Route::get('list',             'index'   )->name('index'    );
        Route::get('data',             'data'    )->name('data'     );
        Route::get('packages',         'packages')->name('packages' );
    });

    /*
	|--------------------------------------------------------------------------
	| Auth Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(AuthController::class)->as('auth.')->group(function () {
        Route::get('login-register',     'loginRegisterForm')->name('login-register');
        Route::post('register',          'register'         )->name('register'      );
        Route::post('login',             'login'            )->name('login'         );
        Route::post('send-otp',          'sendOTP'          )->name('sendOtp'       );
        Route::post('verify-otp',        'verifyOTP'        )->name('verifyOtp'     );
        Route::get('send-email',         'sendEmail'        )->name('sendEmail'     );
    });

    /*
	|--------------------------------------------------------------------------
	| NewsLetter Routes
	|--------------------------------------------------------------------------
	*/
    Route::post('news-letter/store', 'NewsletterController@store');

    /*
	|--------------------------------------------------------------------------
	| Brand Routes
	|--------------------------------------------------------------------------
	*/
    Route::get('brands', 'BrandController@index')->name('brand.index');

    /*
	|--------------------------------------------------------------------------
	| Brand Routes
	|--------------------------------------------------------------------------
	*/
    Route::get('about-us', 'AboutUsController@index')->name('aboutUs.index');

    /*
	|--------------------------------------------------------------------------
	| Contact Us Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(ContactUsController::class)->prefix('contact-us')->as('web.contactUs.')->group(function () {
        Route::get('/',             'index' )->name('index');
        Route::get('show/{id}',     'show'  )->name('show');
    });



    /*
	|--------------------------------------------------------------------------
	| Blog Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(BlogController::class)->prefix('blogs')->as('web.blogs.')->group(function () {
        Route::get('list',          'index'  )->name('index');
        Route::get('show/{id}',     'show'  )->name('show');
    });
});

/*
|--------------------------------------------------------------------------
| Web Protected Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Web', 'middleware' => ['api.auth']], function () {
    /*
	|--------------------------------------------------------------------------
	| Profile Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(ProfileController::class)->as('profile.')->group(function () {
        Route::get('account-info',       'accountInfo')->name('accountInfo');
        // Route::post('register',          'register'         )->name('register'      );
        // Route::post('login',             'login'            )->name('login'         );
        // Route::post('send-otp',          'sendOTP'          )->name('sendOtp'       );
        // Route::post('verify-otp',        'verifyOTP'        )->name('verifyOtp'     );
        // Route::get('send-email',         'sendEmail'        )->name('sendEmail'     );
    });
});
