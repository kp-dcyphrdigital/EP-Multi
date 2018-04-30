<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Entry;

use Illuminate\Http\Request;

class CompetitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competition $competition)
    {
        $entries = $competition->entries()->where('approved', 1)->inRandomOrder()->take(18)->get();
        return view( 'competition.index', compact('entries', 'competition') );      
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faqs(Competition $competition)
    {
        return view( 'competition.faqs', compact('competition') );      
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms(Competition $competition)
    {
        return view( 'competition.terms', compact('competition') );      
    }

}
