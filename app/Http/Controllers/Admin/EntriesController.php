<?php

namespace App\Http\Controllers\Admin;

use App\Entry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SYG\EntriesReportHTMLFormatter;

class EntriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Entry $entry, EntriesReportHTMLFormatter $formatter)
    {
        $competitions = auth()->user()->competitions()->get();
        $entries = $entry->getFilteredEntries($competitions, $formatter);
        return view( 'admin.entries', compact('entries', 'competitions') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        session()->flash( 'backURL', url()->previous() );
        return view( 'admin.edit', compact('entry') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Entry $entry)
    {
        $entry->update(['approved' => !$entry->approved]);
        return redirect( session()->get('backURL') );
    }

}
