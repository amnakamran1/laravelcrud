<?php
use App\Http\Controllers\UserController;
use App\Models\Student;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/index',[UserController::class, 'store']);
// Route::get('student-view/create/',[UserController::class, 'create'])->name('student-view.create');

Route::get('delete/{id}',[UserController::class, 'delete']);
Route::get('edit/{id}',[UserController::class, 'edit']);
Route::put('update/{id}',[UserController::class, 'update']);
Route::get('/login', function () {
    session()->put('user_id',1);
    return redirect('/');
    
    
 });
 Route::get('/logout', function () {
    session()->forget('user_id');
    return redirect('/');
 });
 
 
 Route::get('/no-access', function () {
     echo 'You are not allowed to access this page';
     die;
    });
    Route::middleware(['check'])->group(function(){
        Route::get('/index',[UserController::class, 'index']);
        Route::get('/student-view',[UserController::class, 'view']);
    });