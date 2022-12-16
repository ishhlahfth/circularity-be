<?php

use App\Http\Controllers\Api\Customers\CustomersController;
use App\Http\Controllers\Api\Invoice\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Test\TestController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'test', 'namespace' => 'Test'], function(){
    Route::get('test', [TestController::class, 'testGet']);
});

Route::group(['prefix' =>'v1'], function(){
    Route::get('customers', [CustomersController::class, 'getAllCustomers']);
    Route::post('invoice', [InvoiceController::class, 'generatePayment']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
