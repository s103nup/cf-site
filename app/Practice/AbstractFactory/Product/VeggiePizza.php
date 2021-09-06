<?php
namespace App\Practice\AbstractFactory\Product;

use App\Practice\AbstractFactory\Product\AbstractPizza;


class VeggiePizza extends AbstractPizza
{
    public function prepare(): void
    {
        $this->name = $this->factory->getLocation() . ' Style Veggies Pizza';
        dump('Preparing ' . $this->name);
        dump('Tossing ' . $this->factory->createDough() . '...');
        dump('Adding ' . $this->factory->createSauce() . '...');
        $this->toppings[] = $this->factory->createCheese();
        $this->toppings[] = $this->factory->createVeggies();
        foreach ($this->toppings as $item) {
            dump(' ' . $item);
        }
    }
}