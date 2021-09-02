<?php
namespace App\Practice\Factory\Product;

use App\Practice\Factory\Product\AbstractPizza;

class ChicagoStyleVeggiePizza extends AbstractPizza
{
    public function __construct()
    {
        $this->name = 'Chicago Style Veggie Pizza';
        $this->dough = 'Veggie Dough';
        $this->sauce = 'Veggie Sauce';

        $this->toppings[] = 'Veggie Toppings';
    }
}