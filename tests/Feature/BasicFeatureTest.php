<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Is the site root handling the no promo specified scenario
     *
     * @return void
     */
    public function test_site_root()
    {
        $competition = factory('App\Competition')->create();
        $response = $this->get('/');                
        $response->assertSee($competition->name);
    }

    /**
     * Is a competition root up and showing entries
     *
     * @return void
     */
    public function test_competition_root()
    {
        $competition = factory('App\Competition')->create();
        $entry = factory('App\Entry')->create([
            'competition_id' => $competition->id,
        ]);
        $response = $this->get('/' . $competition->slug);                
        $response->assertSee($entry->firstname);
    }


}
