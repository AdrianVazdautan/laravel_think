<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/add', function(){
    return view('add');
});

Route::get('/advertisement', function(){
    return view('advertisement');
});

Route::get('/article', function(){
    return view('article');
});

Route::get('/cookiepolicy', function(){
    return view('cookiepolicy');
});

Route::get('/copyright', function(){
    return view('copyright');
});

Route::get('/feed', function(){
    return view('feed');
});

Route::get('/feedback', function(){
    return view('feedback');
});

Route::get('/help', function(){
    return view('help');
});

Route::get('/newpassword', function(){
    return view('newpassword');
});

Route::get('/privacy', function(){
    return view('privacy');
});

Route::get('/profile', function(){
    return view('profile');
});

Route::get('/recovery', function(){
    return view('recovery');
});

Route::get('/signin', function(){
    return view('signin');
});

Route::get('/signup', function(){
    return view('signup');
});

Route::get('/terms', function(){
    return view('terms');
});