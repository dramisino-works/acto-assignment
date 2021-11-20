<?php

use Illuminate\Support\Facades\Route;

// Re-routes all web routes to vue router.
Route::get('/{any}', fn() => view('app'))
    ->where('any', '.*');
