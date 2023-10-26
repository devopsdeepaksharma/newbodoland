<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\CsoregistrationController;
use App\Http\Controllers\CSOProjectController;
use App\Http\Controllers\ProjectController;
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
  
Auth::routes(['verify' => true]);





  
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::group(['middleware' => ['auth']], function() {

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('permissions', PermissionController::class);

//cso
Route::get('cso/projectlist',[CSOProjectController::class, 'index'])->name('cso.projectlist');
Route::get('cso/createprojectdetail',[CSOProjectController::class, 'createprojectdetail'])->name('cso.createprojectdetail');
Route::get('cso/approvedprojectdetail',[CSOProjectController::class, 'approvedprojectdetail'])->name('cso.approvedprojectdetail');
Route::post('cso/storeprojectdetail',[CSOProjectController::class, 'storeprojectdetail'])->name('cso.storeprojectdetail');

Route::get('/csoregistration',[CsoregistrationController::class, 'index'])->name('csoregistration');
Route::post('/getcsoregistration',[CsoregistrationController::class, 'store'])->name('getcsoregistration');
Route::get('/awatingforapproval',[CsoregistrationController::class, 'awatingforapproval'])->name('awatingforapproval');

/**
     * Route for Project module Ashu
     */
    Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('project/store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('project/{id}/edit',[ProjectController::class, 'edit'])->name('project.edit');
    Route::get('project/{id}/delete',[ProjectController::class, 'delete'])->name('project.delete');
    Route::post('project/{id}/update',[ProjectController::class, 'update'])->name('project.update');
    Route::post('assignProject',[ProjectController::class, 'assignProject'])->name('assignProject');
});



  
// Route::group(['middleware' => ['auth']], function() {
    
// });




