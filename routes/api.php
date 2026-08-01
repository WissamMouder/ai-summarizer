<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SummarizationController;

Route::post('/summarize', [SummarizationController::class, 'summarize']);