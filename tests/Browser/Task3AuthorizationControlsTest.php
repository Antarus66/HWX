<?php

namespace Tests\Browser;

use App\Entity\User;
use Illuminate\Support\Facades\Artisan;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Task3AuthorizationControlsTest extends DuskTestCase
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

    private function createAdmin()
    {
        $this->admin = factory(User::class)->create([
            'is_admin' => true
        ]);
    }

    public function testUserDontSeeCreateCar()
    {
        $this->createUser();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->user)
                ->visit('/cars')
                ->assertDontSeeLink('Add');
        });
    }

    public function testUserDontSeeUpdateCar()
    {
        $this->createUser();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->user)
                ->visit('/cars/1')
                ->assertDontSeeLink('Add');
        });

        $this->assertTrue(true);
    }

    public function testUserDontSeeDeleteCar()
    {
        $this->createUser();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->user)
                ->visit('/cars/1')
                ->assertDontSee('Delete');
        });
    }

    public function testAdminSeeCreateCar()
    {
        $this->createAdmin();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->admin)
                ->visit('/cars')
                ->assertSeeLink('Add');
        });
    }

    public function testAdminSeeUpdateCar()
    {
        $this->createAdmin();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->admin)
                ->visit('/cars/1')
                ->assertSeeLink('Edit');
        });
    }

    public function testAdminSeeDeleteCar()
    {
        $this->createAdmin();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->admin)
                ->visit('/cars/1')
                ->assertSee('Delete');
        });
    }
}
