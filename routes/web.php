<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'App\Http\Controllers\Frontend\PagesController@index')->name('homepage');

// require __DIR__.'/auth.php';
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';
Route::group(['prefix'=>'admin'], function(){

    Route::get('/dashboard', 'App\Http\Controllers\Backend\PagesController@index')->middleware(['auth'])->name('dashboard');
    
    // firstsection route goes here
    Route::group(['prefix' => 'firstsection'], function(){
	Route::get('/manage', 'App\Http\Controllers\Backend\FirstSectionController@index')->name('firstsection.manage');

	Route::get('/create', 'App\Http\Controllers\Backend\FirstSectionController@create')->name('firstsection.create');

	Route::post('/store', 'App\Http\Controllers\Backend\FirstSectionController@store')->name('firstsection.store');

	Route::get('/edit/{id}', 'App\Http\Controllers\Backend\FirstSectionController@edit')->name('firstsection.edit');

	Route::post('/edit/{id}', 'App\Http\Controllers\Backend\FirstSectionController@update')->name('firstsection.update');

	Route::post('/delete/{id}', 'App\Http\Controllers\Backend\FirstSectionController@destroy')->name('firstsection.destroy');
});

    // teamsection route goes here
    Route::group(['prefix' => 'teamsection'], function(){
	Route::get('/manage', 'App\Http\Controllers\Backend\teamSectionController@index')->name('teamsection.manage');

	Route::get('/create', 'App\Http\Controllers\Backend\teamSectionController@create')->name('teamsection.create');

	Route::post('/store', 'App\Http\Controllers\Backend\teamSectionController@store')->name('teamsection.store');

	Route::get('/edit/{id}', 'App\Http\Controllers\Backend\teamSectionController@edit')->name('teamsection.edit');

	Route::post('/edit/{id}', 'App\Http\Controllers\Backend\teamSectionController@update')->name('teamsection.update');

	Route::post('/delete/{id}', 'App\Http\Controllers\Backend\teamSectionController@destroy')->name('teamsection.destroy');
});
    // teamimage route goes here
    Route::group(['prefix' => 'teamimage'], function(){
	Route::get('/manage', 'App\Http\Controllers\Backend\TeamImageController@index')->name('teamimage.manage');

	Route::get('/create', 'App\Http\Controllers\Backend\TeamImageController@create')->name('teamimage.create');

	Route::post('/store', 'App\Http\Controllers\Backend\TeamImageController@store')->name('teamimage.store');

	Route::get('/edit/{id}', 'App\Http\Controllers\Backend\TeamImageController@edit')->name('teamimage.edit');

	Route::post('/edit/{id}', 'App\Http\Controllers\Backend\TeamImageController@update')->name('teamimage.update');

	Route::post('/delete/{id}', 'App\Http\Controllers\Backend\TeamImageController@destroy')->name('teamimage.destroy');
});
    // writersection route goes here
    Route::group(['prefix' => 'writersection'], function(){
	Route::get('/manage', 'App\Http\Controllers\Backend\writerController@index')->name('writersection.manage');

	Route::get('/create', 'App\Http\Controllers\Backend\writerController@create')->name('writersection.create');

	Route::post('/store', 'App\Http\Controllers\Backend\writerController@store')->name('writersection.store');

	Route::get('/edit/{id}', 'App\Http\Controllers\Backend\writerController@edit')->name('writersection.edit');

	Route::post('/edit/{id}', 'App\Http\Controllers\Backend\writerController@update')->name('writersection.update');

	Route::post('/delete/{id}', 'App\Http\Controllers\Backend\writerController@destroy')->name('writersection.destroy');
});
  // writerimage route goes here
    Route::group(['prefix' => 'writerimage'], function(){
	Route::get('/manage', 'App\Http\Controllers\Backend\WriterImageController@index')->name('writerimage.manage');

	Route::get('/create', 'App\Http\Controllers\Backend\WriterImageController@create')->name('writerimage.create');

	Route::post('/store', 'App\Http\Controllers\Backend\WriterImageController@store')->name('writerimage.store');

	Route::get('/edit/{id}', 'App\Http\Controllers\Backend\WriterImageController@edit')->name('writerimage.edit');

	Route::post('/edit/{id}', 'App\Http\Controllers\Backend\WriterImageController@update')->name('writerimage.update');

	Route::post('/delete/{id}', 'App\Http\Controllers\Backend\WriterImageController@destroy')->name('writerimage.destroy');
});
    // chooseus route goes here
    Route::group(['prefix' => 'chooseus'], function(){
	Route::get('/manage', 'App\Http\Controllers\Backend\ChooseUsController@index')->name('chooseus.manage');

	Route::get('/create', 'App\Http\Controllers\Backend\ChooseUsController@create')->name('chooseus.create');

	Route::post('/store', 'App\Http\Controllers\Backend\ChooseUsController@store')->name('chooseus.store');

	Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ChooseUsController@edit')->name('chooseus.edit');

	Route::post('/edit/{id}', 'App\Http\Controllers\Backend\ChooseUsController@update')->name('chooseus.update');

	Route::post('/delete/{id}', 'App\Http\Controllers\Backend\ChooseUsController@destroy')->name('chooseus.destroy');
});
    // chooseusimage route goes here
    Route::group(['prefix' => 'chooseusimage'], function(){
	Route::get('/manage', 'App\Http\Controllers\Backend\ChooseUsImageController@index')->name('chooseusimage.manage');

	Route::get('/create', 'App\Http\Controllers\Backend\ChooseUsImageController@create')->name('chooseusimage.create');

	Route::post('/store', 'App\Http\Controllers\Backend\ChooseUsImageController@store')->name('chooseusimage.store');

	Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ChooseUsImageController@edit')->name('chooseusimage.edit');

	Route::post('/edit/{id}', 'App\Http\Controllers\Backend\ChooseUsImageController@update')->name('chooseusimage.update');

	Route::post('/delete/{id}', 'App\Http\Controllers\Backend\ChooseUsImageController@destroy')->name('chooseusimage.destroy');
});

    // testimonial route goes here
    Route::group(['prefix' => 'testimonial'], function(){
	Route::get('/manage', 'App\Http\Controllers\Backend\TestimonialController@index')->name('testimonial.manage');

	Route::get('/create', 'App\Http\Controllers\Backend\TestimonialController@create')->name('testimonial.create');

	Route::post('/store', 'App\Http\Controllers\Backend\TestimonialController@store')->name('testimonial.store');

	Route::get('/edit/{id}', 'App\Http\Controllers\Backend\TestimonialController@edit')->name('testimonial.edit');

	Route::post('/edit/{id}', 'App\Http\Controllers\Backend\TestimonialController@update')->name('testimonial.update');

	Route::post('/delete/{id}', 'App\Http\Controllers\Backend\TestimonialController@destroy')->name('testimonial.destroy');
});
    // wework route goes here
    Route::group(['prefix' => 'wework'], function(){
	Route::get('/manage', 'App\Http\Controllers\Backend\WeWorkController@index')->name('wework.manage');

	Route::get('/create', 'App\Http\Controllers\Backend\WeWorkController@create')->name('wework.create');

	Route::post('/store', 'App\Http\Controllers\Backend\WeWorkController@store')->name('wework.store');

	Route::get('/edit/{id}', 'App\Http\Controllers\Backend\WeWorkController@edit')->name('wework.edit');

	Route::post('/edit/{id}', 'App\Http\Controllers\Backend\WeWorkController@update')->name('wework.update');

	Route::post('/delete/{id}', 'App\Http\Controllers\Backend\WeWorkController@destroy')->name('wework.destroy');
});

       // navmenu route goes here
    Route::group(['prefix' => 'navmenu'], function(){
	Route::get('/manage', 'App\Http\Controllers\Backend\BlogController@index')->name('navmenu.manage');

	Route::get('/create', 'App\Http\Controllers\Backend\BlogController@create')->name('navmenu.create');

	Route::post('/store', 'App\Http\Controllers\Backend\BlogController@store')->name('navmenu.store');

	Route::get('/edit/{id}', 'App\Http\Controllers\Backend\BlogController@edit')->name('navmenu.edit');

	Route::post('/edit/{id}', 'App\Http\Controllers\Backend\BlogController@update')->name('navmenu.update');

	Route::post('/delete/{id}', 'App\Http\Controllers\Backend\BlogController@destroy')->name('navmenu.destroy');
});
    
});