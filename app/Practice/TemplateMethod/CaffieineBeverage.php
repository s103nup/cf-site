<?php
namespace App\Practice\TemplateMethod;

use App\Practice\Helper;

abstract class CaffieineBeverage
{
    use Helper;

    final public function prepareRecipe(): void
    {
        $this->boilWater();
        $this->brew();
        $this->pourInCup();
        $this->addCondiments();
    }

    final private function boilWater(): void
    {
        $this->echoWithEol('Boiling water');
    }

    final private function pourInCup(): void
    {
        $this->echoWithEol('Pouring into cup');
    }

    abstract protected function brew(): void;

    abstract protected function addCondiments(): void;
}
