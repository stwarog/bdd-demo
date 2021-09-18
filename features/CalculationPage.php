<?php

declare(strict_types=1);

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
}
