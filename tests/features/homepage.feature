Feature: hoempage test
    Scenario: visit homepage and verify page and grid
        Given visit hompage
        Then page title should read "Log In ‹ The Sun — WordPress"
        And I should see "Username or Email Address"
        And I sign in

