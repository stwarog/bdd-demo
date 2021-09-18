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
}
