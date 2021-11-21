<?php

use Illuminate\Support\Facades\Route;

// Re-routes all web routes to vue.
Route::get('/{any}', fn() => view('app'))->where('any', '.*');
