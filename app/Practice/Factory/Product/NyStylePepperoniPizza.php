<?php
namespace App\Practice\Factory\Product;

use App\Practice\Factory\Product\AbstractPizza;

class NyStylePepperoniPizza extends AbstractPizza
{
    public function __construct()
    {
        $this->name = 'NY Style Pepperoni Pizza';
        $this->dough = 'Pepperoni Dough';
        $this->sauce = 'Pepperoni Sauce';

        $this->toppings[] = 'Pepperoni Toppings';
    }
}