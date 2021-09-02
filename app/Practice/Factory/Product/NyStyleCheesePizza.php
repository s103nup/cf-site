<?php
namespace App\Practice\Factory\Product;

use App\Practice\Factory\Product\AbstractPizza;

class NyStyleCheesePizza extends AbstractPizza
{
    public function __construct()
    {
        $this->name = 'NY Style Sauce and Cheese Pizza';
        $this->dough = 'Thin Crust Dough';
        $this->sauce = 'Marinara Sauce';

        $this->toppings[] = 'Grated Reggiano Cheese';
    }
}