<?php

use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Route;

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

Route::get('/message-send', [WhatsAppController::class, 'messageSend']);



Route::get('/wa/template-message', [WhatsAppController::class, 'templateMessage']);
Route::get('/wa/custom-message', [WhatsAppController::class, 'customMessage']);
