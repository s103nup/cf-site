<?php

declare(strict_types=1);

namespace App\Practice\Decorator;

use App\Practice\Decorator\Beverage;

abstract class CondimentDecorator extends Beverage
{
    protected $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ', ' . $this->getDecoratedDescription();
    }

    abstract public function getDecoratedDescription(): string;
}
