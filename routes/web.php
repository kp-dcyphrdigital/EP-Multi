<?php

Route::get('/', function () {
	$competitions = App\Competition::all();
    return view( 'competition.errors.nopromo', compact('competitions') );
});

Route::get('/{competition}', 'CompetitionsController@index');
Route::get('/{competition}/faqs', 'CompetitionsController@faqs');
Route::get('/{competition}/terms', 'CompetitionsController@terms');

Route::get('/{competition}/enter', 'EntriesController@create');
Route::post('/{competition}/enter', 'EntriesController@store');