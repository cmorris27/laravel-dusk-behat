<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\LoginPage;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example for login.
     *
     * @return void
     *
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
                    ->assertSee('Laravel');
        });
    }
}
