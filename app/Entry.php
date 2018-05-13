<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Entry extends Model
{
    protected $guarded = [];

    public function createEntry($competition_id)
    {
    	$photoname = request()->file('photo')->store('', 'entryimages');
        $this->create([
			'competition_id' => $competition_id,
            'firstname' => request('firstname'),
			'lastname' => request('lastname'),
			'email' => request('email'),
			'telephone' => request('telephone'),
            'url' => $photoname,            
    	]);
    }

    public function getFilteredEntries($competitions)
    {
        $competitionIDs = $competitions->pluck('id')->search( request('competition') ) === false ? $competitions->pluck('id') : [ request('competition') ];

        $sort = request('sort') == 'firstname' ? 'firstname' : 'id';

        $q = request('q');

        if ( request('approved') === '1' ) {
            $approved = [1];
        } else if ( request('approved') === '0' ) {
           $approved = [0];
        } else {
           $approved = [0,1];
        }
        
        return $this->wherein( 'competition_id', $competitionIDs )
                    ->wherein('approved', $approved)
                    ->where(function ($query) use ($q) {
                        $query->where( 'firstname', 'like', "%$q%" )
                        ->orWhere('lastname', 'like', "%$q%" )
                        ->orWhere('email', 'like', "%$q%" )
                        ->orWhere('telephone', 'like', "%$q%" );
                        })
                        ->orderBy($sort)
                ;
    }

}
