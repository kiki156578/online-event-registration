<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;

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
    return view(view:'pages/home');

});
//Route::get('/home',[AuthController::class,'states']);
Route::get('/registration',[AuthController::class,'registration'])->middleware('AlreadyLogin')->middleware('firewall.all');
Route::post('/register-handler',[AuthController::class,'registerHandler'])->name('register-handler')->middleware('preventGetRequests')->middleware('firewall.all');
Route::get('/login',[AuthController::class,'login'])->middleware('AlreadyLogin')->middleware('firewall.all');
Route::post('/login-handler',[AuthController::class,'loginHandler'])->name('login-handler')->middleware('preventGetRequests')->middleware('firewall.all');
Route::get("/about", [WelcomeController::class, 'about'])->middleware('firewall.all');
Route::get('/dashboard',[AuthController::class,'dashboard'])->middleware('IsLoggedIn')->middleware('firewall.all');
Route::get('/logout',[AuthController::class,'logout'])->middleware('firewall.all');
Route::get('eventList',[EventController::class,'index'])->name('eventList')->middleware('IsLoggedIn')->middleware('firewall.all');
Route::get('eventView/{id}',[EventController::class,'view'])->name('view')->middleware('IsLoggedIn')->middleware('firewall.all');
Route::get('join/{id}',[EventController::class,'join'])->name('join')->middleware('IsLoggedIn')->middleware('firewall.all');
Route::get('eventCreate',[EventController::class,'create'])->middleware('IsLoggedIn')->middleware('firewall.all');
Route::post('/event-handler',[EventController::class,'createHandler'])->name('event-handler')->middleware('preventGetRequests')->middleware('firewall.all');
Route::get('/register-handler',function(){
    abort(404);
});
Route::get('/login-handler',function(){
    abort(404);
});
Route::get('/event-handler',function(){
    abort(404);
});

