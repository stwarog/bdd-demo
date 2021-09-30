<?php

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class CalculationPage extends Page
{
    const INPUT_INCOME = '[name="dochod"]';
    const INPUT_METHOD = '#metoda';
    const BUTTON_SUBMIT = 'button';
    const BOX_TAX_TO_PAY = '#tax';

    protected $path = '/';

    public function setIncomeValue($income)
    {
        $element = $this->find('css', self::INPUT_INCOME);
        $element->setValue($income);
    }

    public function selectMethod($method)
    {
        $element = $this->find('css', self::INPUT_METHOD);
        $element->setValue($method);
    }

    public function submitCalculation()
    {
        $element = $this->find('css', self::BUTTON_SUBMIT);
        $element->click();
    }

    public function getCalculatedTax()
    {
        $element = $this->find('css', self::BOX_TAX_TO_PAY);

        if (empty($element)) {
            throw new ElementNotFoundException(sprintf('Could not find an element "%s"', self::BOX_TAX_TO_PAY));
        }

        return $element->getHtml();
    }

    public function electionInvitationHasBeenShown()
    {
        # todo mock
        return true;
    }
}
