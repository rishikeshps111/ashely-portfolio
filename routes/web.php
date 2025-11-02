<?php

use App\Http\Controllers\Web\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/project/{project:slug}', [FrontendController::class, 'projectDetails'])->name('projectDetails');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/services', [FrontendController::class, 'services'])->name('services');

Route::post('/subscribe', [FrontendController::class, 'subscribe'])->name('subscribe');
Route::post('/contact-form', [FrontendController::class, 'contactForm'])->name('contactForm');
