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

    public function approved(\SYG\EntriesReportFormatterInterface $formatter)
    {
        return $formatter->output("Lots of entries");
    }
}
