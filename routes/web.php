<?php

Route::get('/', function () {
	$competitions = App\Competition::all();
    return view( 'competition.errors.nopromo', compact('competitions') );
});

Route::get('/invalidentry', function () {
	$competitions = App\Competition::all();
    return view( 'competition.errors.noentry', compact('competitions') );
});

Route::get('/admin/csv', function () {
	$formatter = new SYG\EntriesReportCSVFormatter;
	die( (new App\Entry)->approved($formatter) );
});

Route::get('/admin/html', function () {
	$formatter = new SYG\EntriesReportHTMLFormatter;
	die( (new App\Entry)->approved($formatter) );
});

Route::get('/{competition}', 'CompetitionsController@index');
Route::get('/{competition}/faqs', 'CompetitionsController@faqs');
Route::get('/{competition}/terms', 'CompetitionsController@terms');

Route::get('/{competition}/enter', 'EntriesController@create');
Route::post('/{competition}/enter', 'EntriesController@store');

Route::get('/{competition}/{entry}', 'EntriesController@show')->middleware('entrydisplayable');;
