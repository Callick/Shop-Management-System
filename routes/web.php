<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomShop;
use App\Http\Controllers\CustomUsers;
use App\Http\Controllers\CustomCustomer;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/add-user', [CustomUsers::class, 'store'])->name('add.user');
    Route::post('/add-shop', [CustomShop::class, 'store'])->name('add.shop');
    Route::post('/add-customer', [CustomCustomer::class, 'store'])->name('add.customer');
});
