<?php

use Illuminate\Support\Facades\Route;
use Nortta\Laravel\PagesController;

Route::post('_nortta/pages', [PagesController::class, 'update']);
Route::delete('_nortta/pages', [PagesController::class, 'destroy']);
