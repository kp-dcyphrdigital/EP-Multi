<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompetitionTest extends TestCase
{

	use RefreshDatabase;

    protected $competition;

    public function setUp()
    {
        parent::setUp();
        $this->competition = factory('App\Competition')->create();
    }

    /** @test */
    function a_competition_has_users()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->competition->users
        );
    }

    /** @test */
    function a_competition_has_faqs()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->competition->faqs
        );
    }

    /** @test */
    function a_competition_has_entries()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->competition->entries
        );
    }

}
