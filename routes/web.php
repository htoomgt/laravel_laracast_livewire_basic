<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileUploadPageController;
use App\Http\Controllers\PollController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchDropdownController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

/*** post related routes start ***/
Route::get('/post-list', [PostController::class, 'showPostsList'])->name('post.list.show');

Route::get('/post/{post}', [PostController::class, 'showPostById'])->name('post.show');

Route::post('/post/{post}/comment', [PostController::class, 'makeCommentOnPost'])->name('comment.store');

Route::get('/post/{post}/edit', [PostController::class, 'editPost'])->name('post.edit');

Route::patch('/post/{post}', [PostController::class, 'updatePost'])->name('post.update');

/*** post related routes end ***/

/*** Polling related route start ***/
Route::get('/poll-example', [PollController::class, 'showPollExamplePage'])->name('poll.example.show');
/*** Polling related route end ***/

/*** File Upload related route start ***/
Route::get('/file-upload-page', [FileUploadPageController::class, 'showFileUploadPage'])->name('file-upload-page.show');
/*** File Upload related route end ***/

/*** Event with tags related route start ***/
Route::get('/event-page', [EventController::class, 'showEventPage'])->name('event.page.show');
/*** Event with tags Upload related route end ***/



