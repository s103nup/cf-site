<?php
namespace App\Practice\Factory\Product;

use App\Practice\Factory\Product\AbstractPizza;

class NyStyleClamPizza extends AbstractPizza
{
    public function __construct()
    {
        $this->name = 'NY Style Clam Pizza';
        $this->dough = 'Clam Dough';
        $this->sauce = 'Clam Sauce';

        $this->toppings[] = 'Clam Toppings';
    }
}