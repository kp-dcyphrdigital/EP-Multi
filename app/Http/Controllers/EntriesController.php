<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Http\Requests\StoreEntry;
use App\Competition;
use Illuminate\Http\Request;

class EntriesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Competition $competition)
    {
        return view( 'competition.enter', compact('competition') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Competition $competition, Entry $entry, StoreEntry $request)
    {
        $entry->createEntry($competition->id);
        // request()->session()->flash('entrystatus', 'success');
        return redirect('/' . $competition->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition, Entry $entry)
    {
        if ($competition->id === $entry->competition_id)
            return view( 'competition.showentry', compact('competition', 'entry') );
        else
            return view( 'competition.errors.noentry', compact('competition', 'entry') );
    }

}
