<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;


Route::get('/', [FaqController::class, 'search'])->name('faq.search');
Route::get('/faqs/special', [FaqController::class, 'listSpecialFaqs'])->name('faqs.special');

Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register.form');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::get('/admin/faqs', [FaqController::class, 'adminIndex'])->name('admin.faqs.index');
Route::post('/admin/faqs', [FaqController::class, 'store'])->name('admin.faqs.store');
Route::get('/admin/faqs/{id}/edit', [FaqController::class, 'edit'])->name('admin.faqs.edit');
Route::put('/admin/faqs/{id}', [FaqController::class, 'update'])->name('admin.faqs.update');
Route::delete('/admin/faqs/{id}', [FaqController::class, 'destroy'])->name('admin.faqs.destroy');
Route::get('/admin/faqs/create', [FaqController::class, 'showCreateForm'])->name('admin.faqs.create.form');
Route::post('/admin/faqs/create', [FaqController::class, 'create'])->name('admin.faqs.create');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
