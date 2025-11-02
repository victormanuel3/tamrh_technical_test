<?php

use App\Livewire\Dashboard\About;
use App\Livewire\Dashboard\Contact;
use App\Livewire\Dashboard\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Home::class)->name('dashboard');
    Route::get('/dashboard/about', About::class)->name('dashboard.about');
    Route::get('/dashboard/contact', Contact::class)->name('dashboard.contact');
});
