<?php

Route::get('/test/test', function() {
	dd ( SeSSioN()->ALL() );
});

// Auth::routes();
// Authentication Routes...
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
// Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('admin/register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('/admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/admin/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/admin/home', 'HomeController@index')->name('home');
Route::get('admin/entries', 'Admin\EntriesController@index');
Route::get('admin/entries/csv', 'Admin\EntriesController@export');
Route::get('admin/entries/{entry}', 'Admin\EntriesController@edit')->middleware('can:update,entry');
Route::patch('admin/entries/{entry}', 'Admin\EntriesController@update')->middleware('can:update,entry');;

/*Route::get('admin/home', 'Admin\AdminEntriesController@dashboard')->name('home');
Route::get('admin/entries/{competition_id}/', 'Admin\AdminEntriesController@index');
Route::get('admin/entries/{competition}/{entry}', 'Admin\AdminEntriesController@show');
Route::patch('admin/entries/{competition}/{entry}', 'Admin\AdminEntriesController@update')->middleware('can:update,entry');*/

Route::get('/', function () {
	$competitions = App\Competition::all();
    return view( 'competition.errors.nopromo', compact('competitions') );
});

Route::get('/invalidentry', function () {
	$competitions = App\Competition::all();
    return view( 'competition.errors.noentry', compact('competitions') );
});

/*Route::get('/admin/csv', function () {
	$formatter = new SYG\EntriesReportCSVFormatter;
	die( (new App\Entry)->approved($formatter) );
});

Route::get('/admin/html', function () {
	$formatter = new SYG\EntriesReportHTMLFormatter;
	die( (new App\Entry)->approved($formatter) );
});*/

/* Customer Facing URLs */
Route::get('/{competition}', 'CompetitionsController@index');
Route::get('/{competition}/faqs', 'CompetitionsController@faqs');
Route::get('/{competition}/terms', 'CompetitionsController@terms');

Route::middleware('throttle:5,1')->group(function () {
	Route::get('/{competition}/enter', 'EntriesController@create');
	Route::post('/{competition}/enter', 'EntriesController@store');
});

Route::get('/{competition}/{entry}', 'EntriesController@show')->middleware('entrydisplayable');