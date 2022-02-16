<?php

use Behat\Behat\Context\Context;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends DuskTestCase implements Context
{
    private Browser $browser;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        parent::setUp();
        static::startChromeDriver();
    }

    /**
     * @When visit hompage
     */
    public function visitHomePage()
    {
        $this->browse(function (Browser $browser) {
            $this->browser = $browser->visit('http://127.0.0.1:8080');
        });
    }

    /**
     * @Then I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        $this->browser->assertSee($arg1);
    }


    /**
     * @Then I should see the grid
     */
    public function iShouldSeeTheGrid()
    {
        $this->browser->assertPresent(".grid");
    }
}
