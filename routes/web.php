<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReceivingController;
use App\Http\Controllers\RecApprovalController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RecUploadController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\OrderingController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/',[DashboardController::class,'index']);

//RECEIVING
Route::post('/store-details', [ReceivingController::class, 'store']);
Route::get('/get-itemcode/{id}', [ReceivingController::class, 'show']);
Route::put('/receiving-edit/{transactionId}/update', [ReceivingEditController::class, 'update']);
Route::get('/get-table-expiry/{id}', [ReceivingController::class, 'getExpiry']);

//RECEIVING UPLOAD
Route::get('/uploadSO',[RecUploadController::class,'index']);
Route::POST('upload-soFile',[RecUploadController::class,'uploadFile']);
Route::get('/upload-list/{id}', [RecUploadController::class, 'show']);

//RECEIVING APPROVAL
Route::get('approvalSO',[RecApprovalController::class,'index']);
Route::get('/approval-list/{id}', [RecApprovalController::class, 'approval']);
Route::put('/update-status-rec', [RecApprovalController::class, 'update'])->name('update-status');
Route::post('/store-expiry', [RecApprovalController::class, 'store']);

//INVENTORY
Route::get('status-details',[InventoryController::class,'index']);
Route::get('/get-itemcodeInv/{id}', [InventoryController::class, 'show']);

//REFERENCE
Route::get('/category/{id}', [ReferenceController::class, 'category']);
Route::post('/update-category', [ReferenceController::class, 'categoryupdate']);
Route::post('/store-category', [ReferenceController::class, 'categorystore']);

//ORDERING
Route::get('/createSO',[OrderingController::class,'index']);
Route::get('/get-sonumber/{id}', [OrderingController::class, 'show']);
Route::post('/store-so', [OrderingController::class, 'store']);
Route::get('/createSO-list/{id}/{SONumber}', [OrderingController::class, 'create']);

