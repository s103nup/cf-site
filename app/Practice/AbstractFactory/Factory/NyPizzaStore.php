<?php
namespace App\Practice\AbstractFactory\Factory;

use App\Practice\Factory\Creator\AbstractPizzaStore;
use App\Practice\AbstractFactory\Product\CheesePizza;
use App\Practice\AbstractFactory\Product\VeggiePizza;
use App\Practice\AbstractFactory\Factory\NyPizzaIngredientFactory;

class NyPizzaStore extends AbstractPizzaStore
{
    public function createPizza($type)
    {
        $factory = new NyPizzaIngredientFactory();
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