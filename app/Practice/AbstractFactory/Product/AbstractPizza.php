<?php
namespace App\Practice\AbstractFactory\Product;

use App\Practice\Factory\Product\AbstractPizza as Pizza;
use App\Practice\AbstractFactory\Factory\AbstractPizzaIngredientFactory;

abstract class AbstractPizza extends Pizza
{
    protected $factory;

    public function __construct(AbstractPizzaIngredientFactory $factory)
    {
        $this->factory = $factory;
    }
}