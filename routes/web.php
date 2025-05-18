<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\JobController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('jobs.index'));

Route::resource('jobs', JobController::class)
    ->only('index', 'show');

Route::get('login', fn() => to_route('auth.create'));
Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');
