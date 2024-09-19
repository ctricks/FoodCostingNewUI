<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReceivingController;
use App\Http\Controllers\RecApprovalController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RecUploadController;


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
Route::get('/createSO',[ReceivingController::class,'index']);
Route::get('/receiving-list/{id}/{Total_Item}/{SONumber}', [ReceivingController::class, 'create']);
Route::post('/store-details', [ReceivingController::class, 'store']);
Route::get('/get-itemcode/{id}', [ReceivingController::class, 'show']);
Route::put('/receiving-edit/{transactionId}/update', [ReceivingEditController::class, 'update']);
Route::post('/store-so', [ReceivingController::class, 'storePO']);
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



