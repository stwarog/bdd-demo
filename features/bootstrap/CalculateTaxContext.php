<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

class CalculateTaxContext implements Context
{
    private CalculationPage $page;

    public function __construct(CalculationPage $page)
    {
        $this->page = $page;
    }

    /**
     * @Given /^there is a "([^"]*)" income$/
     */
    public function thereIsAIncome($income)
    {
        $this->page->open();
        $this->page->setIncomeValue($income);
    }

    /**
     * @Given /^method "([^"]*)" is selected$/
     */
    public function methodIsSelected($method)
    {
        $this->page->selectMethod($method);
    }

    /**
     * @When /^I calculate tax$/
     */
    public function iCalculateTax()
    {
        $this->page->submitCalculation();
    }

    /**
     * @Then /^My tax to pay should be "([^"]*)"$/
     */
    public function myTaxToPayShouldBe($expectedTax)
    {
        if ($actual = $this->page->getCalculatedTax() !== $expectedTax) {
            throw new Exception(sprintf('Expected to have %s tax but is %s', $expectedTax, $actual));
        }
    }

    /**
     * @Given /^I should be invited for the elections$/
     */
    public function iShouldBeInvitedForTheElections()
    {
        throw new PendingException();
    }
}
