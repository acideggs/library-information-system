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

Auth::routes();

/**
*	Route block for Librarian
*/
Route::namespace('Library')->middleware('auth')->group(function(){
	Route::get('/', function(){ return view('librarian.index'); })->name('librarian.dashboard');

	Route::prefix('borrow')->group(function(){
		Route::get('/', 'BorrowController@index')->name('borrow.index');

		Route::get('create', 'BorrowController@create')->name('borrow.create');
		Route::post('store', 'BorrowController@store')->name('borrow.store');

		Route::get('{borrow}/show', 'BorrowController@show')->name('borrow.show');
		Route::patch('{borrow}/return', 'BorrowController@return')->name('borrow.return');
	});

	Route::prefix('book')->group(function(){	
		Route::get('/', 'BookController@index')->name('book.index');
		Route::get('{book}/show', 'BookController@show')->name('book.show');

		Route::get('create', 'BookController@create')->name('book.create');
		Route::post('/', 'BookController@store')->name('book.store');

		Route::get('{book}/edit', 'BookController@edit')->name('book.edit');
		Route::put('{book}', 'BookController@update')->name('book.update');

		Route::get('{book}/delete', 'BookController@delete')->name('book.delete');
		Route::delete('{book}', 'BookController@destroy')->name('book.destroy');
	});
});

Route::middleware(['checkRole', 'auth'])->group(function() {
	Route::get('/route-1', function(){
		return "route 1";
	})->name('route-1');

	Route::get('/route-2', function(){
		return "route 2";
	})->name('route-2');

	Route::get('/route-3', function(){
		return "route 3";
	})->name('route-3');
});
