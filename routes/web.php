<?php

use App\Http\Livewire\Author;
use App\Http\Livewire\Book;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Category;
use App\Http\Livewire\Publisher;
use App\Http\Livewire\Setting;
use App\Http\Livewire\Student;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/author', Author::class)->name('author');
Route::get('/category', Category::class)->name('category');
Route::get('/publisher', Publisher::class)->name('publisher');
Route::get('/book', Book::class)->name('book');
Route::get('/student', Student::class)->name('students');
Route::get('/setting', Setting::class)->name('setting');
