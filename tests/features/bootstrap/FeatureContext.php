<?php

use Behat\Behat\Context\Context;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\LoginPage;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends DuskTestCase implements Context
{
    private Browser $browser;


    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
//     inheritance. feature context is inheriting from duskTestCase. all parent is doing is calling the contructor in dusk testcase
        parent::setUp();
        static::startChromeDriver();
    }

    /**
     * @When visit hompage
     */
    public function visitHomePage()
    {
        $this->browse(function (Browser $browser) {
//            annonymous/hidden function.
            $this->browser = $browser->visit('wp-login.php');
        });
    }

    /**
     * @Then I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        $this->browser->assertSee($arg1);
//         $this->browser->click();
    }

    /**
     * @Then I should see the grid
     */
    public function iShouldSeeTheGrid()
    {
        $this->browser->assertPresent(".grid");
    }

    /**
     * @Then page title should read :arg1
     */
    public function pageTitleShouldRead($arg1)
    {
        $this->browser->assertTitle($arg1);
    }

    /**
     * @Then I sign in
     */
    public function iSignIn()
    {
        $this->browser->type('@username', 'superadmin');
        $this->browser->type('@password', 'superadmin');
        $this->browser->waitFor('@login', 10);
        $this->browser->press('@login');
        $this->browser->assertTitle('Dashboard ‹ The Sun — WordPress');
    }


}
