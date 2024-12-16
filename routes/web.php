<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanikuApiController;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/api/get-tutorial', [TanikuApiController::class, 'get_tutorial']);
Route::get('/api/get-obat', [TanikuApiController::class, 'get_obat']);
Route::get('/api/get-market', [TanikuApiController::class, 'get_market']);
