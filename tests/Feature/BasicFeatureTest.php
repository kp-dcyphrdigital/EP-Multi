<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected $competition;
    public function setUp()
    {
        parent::setUp();
        $this->competition = factory('App\Competition')->create();
    }

    /**
     * Is the site root handling the no promo specified scenario
     *
     * @return void
     */
    public function test_site_root()
    {
        $response = $this->get('/');                
        $response->assertSee($this->competition->name);
    }

    /**
     * Is a competition root up and showing only approved entries
     *
     * @return void
     */
    public function test_competition_root()
    {
        $entryapproved = factory('App\Entry')->create([
            'competition_id' => $this->competition->id,
            'approved' => 1,
        ]);
        $entrynotapproved = factory('App\Entry')->create([
            'competition_id' => $this->competition->id,
            'approved' => 0,
        ]);
        $response = $this->get('/' . $this->competition->slug);                
        $response->assertSee($entryapproved->firstname);
        $response->assertDontSee($entrynotapproved->firstname);
    }

    /**
     * Is a competition faqs page up
     *
     * @return void
     */
    public function test_competition_faqs()
    {
        $response = $this->get('/' . $this->competition->slug . '/faqs');                
        $response->assertStatus(200);
    }

    /**
     * Is a competition tandcs page up
     *
     * @return void
     */
    public function test_competition_terms()
    {
        $response = $this->get('/' . $this->competition->slug . '/terms');
        $response->assertStatus(200);
    }

}
