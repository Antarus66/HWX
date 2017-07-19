<?php

namespace Tests\Browser;

use App\Entity\User;
use Illuminate\Support\Facades\Artisan;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Task1AuthenticationControlTest extends DuskTestCase
{
    public function setUp()
    {
        parent::setUp();

        Artisan::call("migrate:refresh");
    }

    private function createUser()
    {
        $this->user = factory(User::class)->create();
    }

    public function testUnauthorizedDontSeePages()
    {
        $this->browse(function ($browser) {
            $browser->visit('/cars')->assertPathIs('/login');
            $browser->visit('/cars/1')->assertPathIs('/login');
        });
    }

    public function testAuthorizedSeePages()
    {
        $this->createUser();

        $this->browse(function ($browser) {
            $browser
                ->loginAs($this->user)
                ->visit('/cars')->assertPathIs('/cars');
            $browser->visit('/cars/1')->assertPathIs('/cars/1');
        });
    }
}
