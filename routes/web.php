<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'OrderController@index');

Route::get('/hello', function () {
    return '<h1>Hello</h1>';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tests/{any}', function ($any) {
    return view('tests.'.$any);
});

Route::resource('orders', 'OrderController');



Route::get('/foo', function()
{
    $exitCode = Artisan::call('make:model Order -mcr');
    $exitCode = Artisan::call('make:model Type -mcr');
    $exitCode = Artisan::call('make:model Option -mcr');
    $exitCode = Artisan::call('make:seeder TypesTableSeeder');
    $exitCode = Artisan::call('make:seeder OptionsTableSeeder');
});

