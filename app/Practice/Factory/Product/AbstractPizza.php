<?php
namespace App\Practice\Factory\Product;

abstract class AbstractPizza
{
    protected $name;

    protected $dough;

    protected $sauce;

    protected $toppings;

    public function prepare(): void
    {
        dump('Preparing ' . $this->name);
        dump('Tossing dough...');
        dump('Adding sauce...');
        foreach ($this->toppings as $item) {
            dump(' ' . $item);
        }
    }

    public function bake(): void
    {
        dump('Bake for 25 minutes at 350');
    }

    public function cut(): void
    {
        dump('Cutting the pizza into diagonal slices');
    }

    public function box(): void
    {
        dump('Place pizza in official PizzaStore box');
    }

    public function getName(): string
    {
        return $this->name;
    }
}