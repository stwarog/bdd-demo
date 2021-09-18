<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

class CalculateTaxContext implements Context
{
    /**
     * @Given /^there is a "([^"]*)" income$/
     */
    public function thereIsAIncome($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^method "([^"]*)" is selected$/
     */
    public function methodIsSelected($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When /^I calculate tax$/
     */
    public function iCalculateTax()
    {
        throw new PendingException();
    }

    /**
     * @Then /^My tax to pay should be "([^"]*)"$/
     */
    public function myTaxToPayShouldBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I should be invited for the elections$/
     */
    public function iShouldBeInvitedForTheElections()
    {
        throw new PendingException();
    }
}
