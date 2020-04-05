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
Route::get('/','Homepage@index')->name('index');

Route::get('/panel/giris','Dashboard@login')->name('login');

Route::get('/panel','Dashboard@index')->name('dashboard');

Route::get('/panel/urun','Dashboard@product')->name('product');

Route::post('/panel/urun','Dashboard@productPost')->name('product.create');

Route::get('/panel/satici','Dashboard@customer')->name('customer');

Route::get('/panel/kategoriler','Dashboard@categories')->name('categories');

Route::post('/panel/satici','Dashboard@customerPost')->name('customer.create');

Route::get('/panel/urun/all','Dashboard@allProduct')->name('all.product');

Route::get('/panel/satici/all','Dashboard@allCustomer')->name('all.customer');

Route::post('/panel/kategoriler','Dashboard@categoriesPost')->name('categories.create');

Route::get('/panel/kategoriler/all','Dashboard@allCategories')->name('all.categories');

Route::get('/panel/admin','Dashboard@adminUser')->name('admin');

Route::post('/panel/admin','Dashboard@adminPost')->name('admin.create');

Route::get('/panel/admin/sifredegistir','Dashboard@register')->name('register');

Route::post('/panel/admin/sifredegistir','Dashboard@registerPost')->name('register.post');
