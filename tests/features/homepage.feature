Feature: BDD Test
    In order to learn how to integrate Behat with Laravel Dusk
    Scenario: visit homepage
        When visit hompage
        Then I should see "Laravel"
        And I should see the grid
