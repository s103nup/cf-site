<?php

declare(strict_types=1);

namespace App\Practice\Decorator;

use App\Practice\Decorator\CondimentDecorator;

class Soy extends CondimentDecorator
{
    public function getDecoratedDescription(): string
    {
        return 'Soy';
    }

    public function cost(): float
    {
        return 0.32 + $this->beverage->cost();
    }
}
