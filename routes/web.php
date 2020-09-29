<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchDropdownController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'showLandingPage']);

Route::get('/contact_form', [ContactController::class, 'showContactForm']);

Route::post('/send_contact_form', [ContactController::class, 'sendContactMessage'])->name('send_contact_message');

Route::get('/dropdown_page', [SearchDropdownController::class, 'showSearchDropdownPage']);

Route::get('/user_list', [UserController::class, 'showUserList']);

Route::get('/comments', [CommentController::class, 'showComments']);
