Feature: hoempage test
    Scenario: visit homepage and verify page and grid
        Given visit hompage
        Then I should see "Laravel"
        And I should see the grid
