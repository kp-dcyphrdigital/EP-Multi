<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Competition;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competitions = Competition::wherein( 'id', auth()->user()->competitions()->pluck('id') )
                            ->select('name')->withCount([
                                'entries',
                                'entries as approved_entries_count' => function ($query) {
                                    $query->where('approved', true);
                                },
                                'entries as unapproved_entries_count' => function ($query) {
                                    $query->where('approved', false);
                                },
                            ])->get();

        $entries = Entry::where('approved', 0)
                    ->wherein( 'competition_id', auth()->user()->competitions()->pluck('id') )
                    ->get();
                    
        return view( 'admin.home', compact('competitions', 'entries') );
    }
}
