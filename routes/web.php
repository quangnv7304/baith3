<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::resource('tasks', TaskController::class);

Route::get('/', function () {
    return view('welcome');
});
