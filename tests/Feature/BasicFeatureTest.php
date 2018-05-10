<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use App\Rules\Recaptcha;


class BasicFeatureTest extends TestCase
{
    use RefreshDatabase, MockeryPHPUnitIntegration;

    protected $competition;
    public function setUp()
    {
        parent::setUp();
        $this->competition = factory('App\Competition')->create();

        app()->singleton(Recaptcha::class, function () {
            return \Mockery::mock(Recaptcha::class, function ($m) {
                $m->shouldReceive('passes')->andReturn(true);
            });
        });
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
        $faq = factory('App\FAQ')->create([
            'competition_id' => $this->competition->id,
        ]);

        $response = $this->get('/' . $this->competition->slug . '/faqs');
        $response->assertSee($faq->question);
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

    /**
     * Need an entry form working!
     *
     * @return void
     */
    public function test_competition_entry()
    {
        $response = $this->get('/' . $this->competition->slug . '/enter');
        $response->assertStatus(200);
    }

   /**
     * Is a competition root up and showing only approved entries
     *
     * @return void
     */
    public function test_see_an_entry()
    {
        $entry = factory('App\Entry')->create([
            'competition_id' => $this->competition->id,
            'approved' => 1,
        ]);
        $response = $this->get('/' . $this->competition->slug . '/' . $entry->id);
        $response->assertSee($entry->firstname);
    }

   /**
     * Is an entry submitting and saving all values to DB
     *
     * @return void
     */
    public function test_create_an_entry()
    {
        Storage::fake('entryimages');

        $this->submitEntry([
            'firstname' => 'Testing', 
            'lastname' => 'Phpunit',
            'email' => 'testing@phpunit.com',
            'telephone' => '0412345678',
            'photo' => $file = UploadedFile::fake()->image('abc.jpg'),
            'optin' => 1,
        ]);
        
        $this->assertDatabaseHas('entries', [
            'competition_id' => $this->competition->id,
            'firstname' => 'Testing', 
            'lastname' => 'Phpunit',
            'email' => 'testing@phpunit.com',
            'telephone' => '0412345678',
            'url' => $file->hashName(),
            'approved' => 0,
        ]);

    }

   /**
     * An entry should have a compling image
     *
     * @return void
     */
    public function test_entry_should_have_compling_image()
    {
        $this->withExceptionHandling();
        $this->submitEntry(['photo' => '',])
            ->assertSessionHasErrors('photo');
    }

   /**
     * An entry should have a first name
     *
     * @return void
     */
    public function test_entry_should_have_first_name()
    {
        $this->withExceptionHandling();
        $this->submitEntry(['firstname' => '',])
            ->assertSessionHasErrors('firstname');
    }

   /**
     * An entry should have a last name
     *
     * @return void
     */
    public function test_entry_should_have_last_name()
    {
        $this->withExceptionHandling();
        $this->submitEntry(['lastname' => '',])
            ->assertSessionHasErrors('lastname');
    }

    public function test_entry_should_have_a_valid_email()
    {
        $this->withExceptionHandling();
        $this->submitEntry(['email' => '',])
            ->assertSessionHasErrors('email');
    }

    public function test_entry_should_have_a_valid_telephone()
    {
        $this->withExceptionHandling();
        $this->submitEntry(['telephone' => '041122233',])
            ->assertSessionHasErrors('telephone');
    }

    public function test_entry_should_accept_tcs()
    {
        $this->withExceptionHandling();
        $this->submitEntry(['optin' => '',])
            ->assertSessionHasErrors('optin');
    }

    /** @test */
    function test_entry_requires_recaptcha_verification()
    {
        if (Recaptcha::isInTestMode()) {
            $this->markTestSkipped("Recaptcha is in test mode.");
        }
        
        $this->withExceptionHandling();
        unset(app()[Recaptcha::class]);
        $this->submitEntry()
            ->assertSessionHasErrors('g-recaptcha-response');
    }

    protected function submitEntry($overrides = [])
    {
        $entry = factory('App\Entry')->make($overrides);
        return $this->post('/' . $this->competition->slug . '/enter', $entry->toArray() + [
            'g-recaptcha-response' => 'token',
        ]);
    }

}