<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserManaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MyItemInboxController;
use App\Http\Controllers\MatchingController;
use App\Http\Controllers\RequestMatchController;
use App\Http\Controllers\VerifyController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home',                         [HomeController::class, 'index'])->middleware(['auth', 'profile'])->name('home');
Route::resource('profile',                  ProfileController::class)->middleware('auth');

Route::resource('myItem',                   MyItemController::class)->middleware(['auth', 'profile']);
Route::get('/getMyItem',                    [MyItemController::class, 'list'])->middleware('auth');
Route::post('/setComment',                  [MyItemController::class, 'set_comment'])->middleware('auth')->name('setComment');

Route::resource('item',                     ItemController::class)->middleware(['auth', 'profile']);
Route::get('/getItem',                      [ItemController::class, 'list']);

Route::resource('matching',                 MatchingController::class)->middleware(['auth', 'profile']);
Route::get('/getMatching',                  [MatchingController::class, 'list'])->middleware('auth');

Route::get('/getUserMana',                  [UserManaController::class, 'list'])->middleware('auth');

Route::resource('userMana',                 UserManaController::class)->middleware(['auth', 'profile']);
Route::get('/getDetail/{userMana}',         [UserManaController::class, 'showDetail'])->middleware('auth');

Route::get('/blockUser',                    [UserManaController::class, 'set_block'])->middleware('auth');


Route::resource('/requestMatch',            RequestMatchController::class)->middleware(['auth', 'profile']);

Route::get('/requestMatch_inbox',           [RequestMatchController::class, 'inbox'])->middleware(['auth', 'profile'])->name('requestMatch_inbox');

Route::resource('myItem_inbox',              MyItemInboxController::class)->middleware(['auth', 'profile']);

Route::get('/getAllItem',                   [ItemController::class, 'getAllItem']);

Route::get('process-transaction',           [MyItemController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction',           [MyItemController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction',            [MyItemController::class, 'cancelTransaction'])->name('cancelTransaction');

Route::get('/verify-email/{id}/{token}',    [VerifyController::class, 'index']);