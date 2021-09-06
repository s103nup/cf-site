<?php
namespace App\Practice\AbstractFactory\Factory;

use App\Practice\Factory\Creator\AbstractPizzaStore;
use App\Practice\AbstractFactory\Product\CheesePizza;
use App\Practice\AbstractFactory\Product\VeggiePizza;
use App\Practice\AbstractFactory\Factory\ChicagoPizzaIngredientFactory;

class ChicagoPizzaStore extends AbstractPizzaStore
{
    public function createPizza($type)
    {
        $factory = new ChicagoPizzaIngredientFactory();
        switch ($type) {
            case 'cheese':
                return new CheesePizza($factory);
                break;
            case 'veggie':
                return new VeggiePizza($factory);
                break;
            default:
                return null;
        }
    }
}