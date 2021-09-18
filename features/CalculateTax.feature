Feature: Calculate Tax
    In order to calculate tax
    As a customer
    I need to be able to place my income

    Rules:
    - Method "one"
        constant tax 20%
    - Method "two
        tax free allowance 5000
        income < 2000 - voting bonus 1000
        income > 100000 tax is 40%

    Scenario: Calculating tax for 10000 income
        Given there is a "10000" income
        And method "one" is selected
        When I calculate tax
        Then My tax to pay should be "2000"

    Scenario: Calculating tax for 0 income
        Given there is a "0" income
        And method "one" is selected
        When I calculate tax
        Then My tax to pay should be "0"

    Scenario: Calculating tax for 10000 income by method "two"
        Given there is a "10000" income
        And method "two" is selected
        When I calculate tax
        Then My tax to pay should be "1000"

    Scenario: Calculating tax for 5000 income by method "two"
        Given there is a "5000" income
        And method "two" is selected
        When I calculate tax
        Then My tax to pay should be "0"

    # @javascript todo mock
    Scenario: Calculating tax for 2000 income by method "two"
        Given there is a "2000" income
        And method "two" is selected
        When I calculate tax
        Then My tax to pay should be "-1000"
        And I should be invited for the elections
