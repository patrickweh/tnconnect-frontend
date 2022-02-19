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
Route::view('/', 'frontend::livewire.dashboard.index')->name('dashboard');
Route::view('/contacts', 'frontend::livewire.contacts.index')->name('contacts');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
});
