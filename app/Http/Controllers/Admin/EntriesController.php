<?php

namespace App\Http\Controllers\Admin;

use App\Entry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function index()
    {
        $order = request('sort') == 'firstname' ? 'firstname' : 'id';
        $q = request('q');
        $approved = request('approved') == 1 ? [1] : [0,1];
        $entries = Entry::wherein( 'competition_id', auth()->user()->competitions()->pluck('id') )
                    ->wherein('approved', $approved)
                    ->where(function ($query) use ($q) {
                        $query->where( 'firstname', 'like', "%$q%" )
                            ->orWhere('lastname', 'like', "%$q%" )
                            ->orWhere('email', 'like', "%$q%" )
                            ->orWhere('telephone', 'like', "%$q%" );
                    })
                    ->orderBy($order)
                    ->get();
        return view( 'admin.entries', compact('entries') );
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
