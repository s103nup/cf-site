<?php

declare(strict_types=1);

namespace App\Practice\Decorator;

abstract class Beverage
{
    protected $description = 'Unknown Beverage';

    public function getDescription(): string
    {
        return $this->description;
    }

    abstract public function cost(): float;
}
