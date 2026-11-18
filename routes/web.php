<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.create');
});

Route::resource('tasks', TaskController::class); // create all operation.
