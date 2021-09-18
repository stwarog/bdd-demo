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

    Scenario Outline: Calculating tax for incomes by methods "one" or "two"
        Given there is a <income> income
        And method <method> is selected
        When I calculate tax
        Then My tax to pay should be <expected>
        Examples:
            | income | expected | method |
            | 100000|  20000    | one    |
            | 10000 |  2000     | one    |
            | 0     |  0        | one    |
            | 100000|  38000    | two    |
            | 10000 |  1000     | two    |
            | 5000  |  0        | two    |
            | 2000  |  -1000    | two    |
            | 1000  |  -1000    | two    |

    # @javascript todo mock
    Scenario: Calculating tax with voting bonus should send an invitation
        Given there is a 2000 income
        And method two is selected
        When I calculate tax
        Then My tax to pay should be -1000
        And I should be invited for the elections
