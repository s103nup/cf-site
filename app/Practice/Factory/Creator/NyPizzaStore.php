<?php
namespace App\Practice\Factory\Creator;

use App\Practice\Factory\Product\NyStyleClamPizza;
use App\Practice\Factory\Creator\AbstractPizzaStore;
use App\Practice\Factory\Product\NyStyleCheesePizza;
use App\Practice\Factory\Product\NyStyleVeggiePizza;
use App\Practice\Factory\Product\NyStylePepperoniPizza;

class NyPizzaStore extends AbstractPizzaStore
{
    public function createPizza($type)
    {
        switch ($type) {
            case 'cheese':
                return new NyStyleCheesePizza();
                break;
            case 'veggie':
                return new NyStyleVeggiePizza();
                break;
            case 'clam':
                return new NyStyleClamPizza();
                break;
            case 'pepperoni':
                return new NyStylePepperoniPizza();
                break;
            default:
                return null;
        }
    }
}