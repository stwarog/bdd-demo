<?php

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class CalculationPage extends Page
{
    protected $path = '/';

    public function setIncomeValue($income)
    {
        $element = $this->find('css', '[name="dochod"]');
        $element->setValue($income);
    }

    public function selectMethod($method)
    {
        $element = $this->find('css', '#metoda');
        $element->setValue($method);
    }

    public function submitCalculation()
    {
        $element = $this->find('css', 'button');
        $element->click();
    }

    public function getCalculatedTax()
    {
        $element = $this->find('css', '#tax');

        if (empty($element)) {
            throw new ElementNotFoundException(sprintf('Could not find an element "%s"', '#tax'));
        }

        return $element->getHtml();
    }

    public function electionInvitationHasBeenShown()
    {
        # todo mock
        return true;
    }
}
