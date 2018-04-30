<?php

Route::get('/', function () {
	$competitions = App\Competition::all();
    return view( 'errors.nopromo', compact('competitions') );
});

Route::get('/{competition}', 'CompetitionsController@index');