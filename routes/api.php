<?php

use App\Http\Controllers\Api\Developer\DeveloperController;
use App\Http\Controllers\Api\Sprint\SprintController;
use App\Http\Controllers\Api\Sprint\SprintTaskController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'sprints'], function () {
    Route::get('/', SprintController::class);

    Route::get('/{sprintId}/tasks', SprintTaskController::class);
});

Route::get('/developers', DeveloperController::class);
