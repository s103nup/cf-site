<?php
namespace App\Practice\Factory\Creator;

use App\Practice\Factory\Product\AbstractPizza;

abstract class AbstractPizzaStore
{
    abstract public function createPizza($type);

    public function orderPizza(String $type): AbstractPizza
    {
        $pizza = $this->createPizza($type);
        
        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();

        return $pizza;
    }
}