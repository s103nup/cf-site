<?php
namespace App\Practice\Factory\Creator;

use App\Practice\Factory\Creator\AbstractPizzaStore;
use App\Practice\Factory\Product\ChicagoStyleCheesePizza;
use App\Practice\Factory\Product\ChicagoStyleVeggiePizza;

class ChicagoPizzaStore extends AbstractPizzaStore
{
    public function createPizza($type)
    {
        switch ($type) {
            case 'cheese':
                return new ChicagoStyleCheesePizza();
                break;
            case 'veggie':
                return new ChicagoStyleVeggiePizza();
                break;
            default:
                return null;
        }
    }
}