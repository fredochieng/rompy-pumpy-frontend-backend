<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('website.homepage');
//});

// Route::get('/', function () {
//     return view('auth.login');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomepageController::class, 'homepage'])->name('homepage');
Route::get('/models/city/search', [App\Http\Controllers\HomepageController::class, 'models_city_search'])->name('models.city_search');
Route::get('/profile/{model_no}', [App\Http\Controllers\HomepageController::class, 'profile'])->name('profile');
Route::get('/auth/login', [App\Http\Controllers\HomepageController::class, 'login'])->name('login');
Route::post('/model/process_login', [App\Http\Controllers\HomepageController::class, 'process_login'])->name('model.process_login');
Route::get('/account/{model_no}', [App\Http\Controllers\AccountController::class, 'account'])->name('account');
Route::post('/model/update-profile/{model_no}', [App\Http\Controllers\AccountController::class, 'model_update_profile'])->name('model.update_profile');
Route::get('/my-subscription/{model_no}', [App\Http\Controllers\AccountController::class, 'get_model_subs'])->name('my_subscription');
Route::get('/my-services/{model_no}', [App\Http\Controllers\AccountController::class, 'get_model_services'])->name('my_services');
Route::get('/my-pictures/{model_no}', [App\Http\Controllers\AccountController::class, 'get_model_pics'])->name('my_pics');
Route::post('/picture/save', [App\Http\Controllers\AccountController::class, 'model_add_pictures'])->name('model.add_picture');
Route::post('/service/add', [App\Http\Controllers\AccountController::class, 'add_model_services'])->name('model.add_service');
Route::get('/change-password/{model_no}', [App\Http\Controllers\AccountController::class, 'show_change_password_form']);
Route::post('/change_password', [App\Http\Controllers\AccountController::class, 'change_password'])->name('model.change_password');

Route::get('/sign-out', [App\Http\Controllers\AccountController::class, 'sign_out'])->name('sign_out');


Auth::routes();
Route::get('/forgot-password', [App\Http\Controllers\ForgotPassController::class, 'show_password_reset_form']);
Route::post('/reset/password', [App\Http\Controllers\ForgotPassController::class, 'reset_password'])->name('reset.mypassword');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/country/get-country-towns', [App\Http\Controllers\SelectorController::class, 'GetCountryCities']);
Route::get('/city/get-city-towns', [App\Http\Controllers\SelectorController::class, 'GetCityTowns']);
Route::get('/country/get-country-ethnicities', [App\Http\Controllers\SelectorController::class, 'GetCountryEthnicities']);
Route::get('/subscription/get-sub-price', [App\Http\Controllers\SelectorController::class, 'GetSubPkgAmount']);
Route::get('/subscription/get-sub-end-date', [App\Http\Controllers\SelectorController::class, 'GetSubPkgEndDate']);
