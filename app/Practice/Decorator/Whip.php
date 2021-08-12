<?php

declare(strict_types=1);

namespace App\Practice\Decorator;

use App\Practice\Decorator\CondimentDecorator;

class Whip extends CondimentDecorator
{
    public function getDecoratedDescription(): string
    {
        return 'Whip';
    }

    public function cost(): float
    {
        return 0.11 + $this->beverage->cost();
    }
}
