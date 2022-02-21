<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/loginform', 'frontend::livewire.auth.login')->name('loginform');
Route::get('/', \Modules\Frontend\Http\Livewire\Dashboard\Index::class)->name('dashboard');
Route::get('/contacts', \Modules\Frontend\Http\Livewire\Contacts\Index::class)->name('contacts');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
});
