<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});


//ACCCESS BY GUEST TO SEND HERS COMPLAINT
Route::get('tickets/create', [TicketController::class, 'create'])->name('ticket-create');
Route::post('tickets/store', [TicketController::class, 'store'])->name('ticket-store');
 
//ACCESS BY ANY AUTHENTICATED USER
 Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

//ACCESS BY DISPATCHER AND AGENT AFTER AUTHENTIFICATION
Route::get('home/tickets/dispatchers', [TicketController::class, 'getTicketToDispatch'])->name('dispatchers')->middleware('auth');
Route::put('home/tickets/dispatchers', [TicketController::class, 'setTicketToAgent'])->name('dispatchers')->middleware('auth');

Route::get('home/tickets/closures', [TicketController::class, 'getTicketToClosure'])->name('closures')->middleware('auth');
Route::put('home/tickets/closures', [TicketController::class, 'setStatusOfTicket'])->name('closures')->middleware('auth');

/** ACCESS BY ADMIN  */
//create new user
Route::get('admin/users/create', [UserController::class, 'create'])->name('users-create')->middleware('auth','admin');
Route::post('admin/users/store', [UserController::class, 'store'])->name('users-store')->middleware('auth','admin');
//set role(s) to user
Route::get('admin/users', [UserController::class, 'index'])->name('users-index')->middleware('auth','admin');
Route::get('admin/users/details/{id}', [UserController::class, 'getDetailOfUser'])->name('user-detail')->middleware('auth','admin');
Route::put('admin/users/set-role', [UserController::class, 'setRoleToUser'])->name('user-set-role')->middleware('auth','admin');
//Delete a user
Route::delete('admin/users/destroy', [UserController::class, 'destroy'])->name('user-destroy')->middleware('auth','admin');

//update profile by any authentificated user
Route::resource('admin/users', UserController::class)->only([ 'show', 'edit', 'update' ])->middleware('auth');
//Role management by ADMIN
Route::resource('admin/roles', RoleController::class)->middleware('auth','admin');


// Authentication routes...
Route::get('auth/login', [LoginController::class, 'index'])->name('login');
Route::post('auth/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('auth/logout', [LoginController::class, 'logout'])->name('logout');
