<?php

use App\Http\Livewire\Author;
<<<<<<< HEAD
use App\Http\Livewire\Dashboard;
=======
use App\Http\Livewire\Category;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Publisher;
use App\Http\Livewire\Setting;
>>>>>>> 037bb2b (lms)
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/author', Author::class)->name('author');
<<<<<<< HEAD
=======
Route::get('/category', Category::class)->name('category');
Route::get('/publisher', Publisher::class)->name('publisher');
Route::get('/setting', Setting::class)->name('setting');
>>>>>>> 037bb2b (lms)
