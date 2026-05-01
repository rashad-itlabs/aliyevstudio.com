<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Api\v1\ChatController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::put('/changePassword/{userId}', [ApiController::class, 'change_password']);
    Route::put('/notificationUpdate/{userId}', [ApiController::class, 'notificationUpdate']);

    Route::post('/send-message', [ChatController::class, 'sendMessage']);
    Route::get('/messages/{receiverId}', [ChatController::class, 'getMessages']);

    Route::get('getNotification/{userID}',[ApiController::class,'show_notification']);


    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/doctors', [ApiController::class, 'doctors']);
    Route::get('/drCategories', [ApiController::class, 'dr_categories']);
    Route::get('/patients/{doctorID}', [ApiController::class, 'patients']);
    
    Route::get('/work_hours/{id}', [ApiController::class, 'work_hours']);

    Route::get('/getBookDoktor/{id}',[ApiController::class,'book_list_for_doctor']);
    Route::get('/getBook',[ApiController::class,'book_list']);
    Route::post('/createBook',[ApiController::class,'create_book']);
    Route::put('/updateBook/{id}',[ApiController::class,'update_book']);
    Route::put('/updateBookStatus/{id}',[ApiController::class,'update_book_status']);
    Route::delete('/deleteBook/{id}',[ApiController::class,'delete_book']);


    // POST
    Route::post('addPatient',[ApiController::class, 'add_patient']);
    Route::post('/store_schedule', [ApiController::class, 'store_schedule']);
    Route::put('/update_profile/{id}', [ApiController::class, 'updateProfile']);
    // FCM TOKEN
    Route::put('/add_fcm_profile/{userId}', [ApiController::class, 'updateFcmProfile']);
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});


// Version 1 API Routes
Route::prefix('v1')->group(function () {
    Route::get('products',[ApiController::class,'products']);
    Route::get('productsInfo/{id}',[ApiController::class,'productsInfo']);
    Route::get('categories',[ApiController::class,'categories']);

    // Randevu REST API üçün route-ları bura əlavə edə bilərsiniz
    
});
