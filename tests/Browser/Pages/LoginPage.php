<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class LoginPage extends Page
{

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@username' => '#user_login',
            '@password' => '#user_pass',
            '@login' => '#wp-submit',
        ];
    }

    public function url(): string {
        return 'wp-login.php';
    }
}
