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
        Route::get('/',                 'commingSoon'   )->name('commingSoon'   );
        Route::get('index',             'index'         )->name('index'         );
        Route::get('countries/list',    'countriesList' )->name('countries.list');
        Route::get('regions/list',      'regionsList'   )->name('regions.list'  );
    });

    /*
	|--------------------------------------------------------------------------
	| Plans Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(PlanController::class)->prefix('plans')->as('plans.')->group(function () {
        Route::get('list',              'index'         )->name('index'         );
        Route::get('countries/list',    'countriesList' )->name('countries.list');
        Route::get('regions/list',      'regionsList'   )->name('regions.list'  );
        Route::get('packages',          'packages'      )->name('packages'      );
        Route::post('intended-url',     'intendedUrl'   )->name('intendedUrl'   );
    });

    /*
	|--------------------------------------------------------------------------
	| Auth Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(AuthController::class)->as('auth.')->group(function () {
        Route::get('login-register',     'loginRegisterForm' )->name('login-register');
        Route::post('register',          'register'          )->name('register'      );
        Route::post('login',             'login'             )->name('login'         );
        Route::get('otp',                'otpForm'           )->name('otp-form'      );
        Route::post('send-otp',          'sendOTP'           )->name('sendOtp'       );
        Route::post('verify-otp',        'verifyOTP'         )->name('verifyOtp'     );
        Route::get('forgot-password',    'forgotPasswordForm')->name('forgotPassword');
        Route::post('forgot-password',   'forgotPassword'    )->name('forgotPassword');
        Route::get('reset-password',     'resetPasswordForm' )->name('resetPassword' );
        Route::post('reset-password',    'resetPassword'     )->name('resetPassword' );
    });

    /*
	|--------------------------------------------------------------------------
	| Pages Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(PagesController::class)->as('page.')->group(function () {
        Route::get('about-us',              'aboutUs'        )->name('aboutUs'          );
        Route::get('contact-us',            'contactUs'      )->name('contactUs'        );
        Route::post('contact-us',           'contactUsSave'  )->name('contactUs'        );
        Route::get('privacy-policy',        'privacyPolicy'  )->name('privacyPolicy'    );
        Route::get('terms-and-conditions',  'termsConditions')->name('termsConditions'  );
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
        Route::get('account-info',          'accountInfoForm'   )->name('accountInfo');
        Route::post('account-info',         'accountInfo'       )->name('accountInfo');
        Route::get('payments',              'payments'          )->name('payments'   );
        Route::get('payments-data',        'paymentData'       )->name('paymentData');
        Route::get('logout',                'logout'            )->name('logout'     );
        // Route::post('register',          'register'         )->name('register'      );
        // Route::post('login',             'login'            )->name('login'         );
        // Route::post('send-otp',          'sendOTP'          )->name('sendOtp'       );
        // Route::post('verify-otp',        'verifyOTP'        )->name('verifyOtp'     );
        // Route::get('send-email',         'sendEmail'        )->name('sendEmail'     );
    });

    /*
	|--------------------------------------------------------------------------
	| Plans Routes
	|--------------------------------------------------------------------------
	*/
    Route::controller(PlanController::class)->prefix('plans')->as('plans.')->group(function () {
        Route::post('buy_now',       'buyNow')->name('buyNow');
        Route::post('subscription',  'subscription')->name('subscription');
    });
});
