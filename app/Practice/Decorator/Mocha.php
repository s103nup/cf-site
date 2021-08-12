<?php

declare(strict_types=1);

namespace App\Practice\Decorator;

use App\Practice\Decorator\CondimentDecorator;

class Mocha extends CondimentDecorator
{
    public function getDecoratedDescription(): string
    {
        return 'Mocha';
    }

    public function cost(): float
    {
        return 0.20 + $this->beverage->cost();
    }
}
