<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;

Route::get('/', function () {
    return redirect()->route('dosen.index');
});

Route::resource('dosen', DosenController::class);
