<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Dbislemleri;

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

Route::get('/',[Home::class,"home"])->name("index");


Route::get("/register",[Home::class,"register"])->name("register");


Route::middleware("createuserauth")->post("/registercompleted",[Dbislemleri::class,"user"])->name("createuser");

Route::middleware('loginauth')->post('/home',[Home::class,'login'])->name("home");
Route::get('/hosgeldin',[Home::class,'hosgeldin'])->name('hosgeldin');
Route::get('/forgetpass',[Dbislemleri::class,'forgetindex'])->name('forgetpass');
Route::post('/forgetpassword',[Dbislemleri::class,'forgetpass'])->name('forget');
Route::get('/home',function()
{
 return view('home');
});
