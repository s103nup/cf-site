<?php
namespace App\Practice\Factory\Product;

use App\Practice\Factory\Product\AbstractPizza;

class ChicagoStyleCheesePizza extends AbstractPizza
{
    public function __construct()
    {
        $this->name = 'Chicago Style DeepDish Cheese Pizza';
        $this->dough = 'Extra Thick Crust Dough';
        $this->sauce = 'Plum Tomato Sauce';

        $this->toppings[] = 'Shredded Mozzarella Cheese';
    }

    public function cut(): void
    {
        dump('Cutting the pizza into square slices');
    }
}