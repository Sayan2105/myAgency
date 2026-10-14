<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Public contact form endpoint: max 5 sends per minute per visitor.
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1');
