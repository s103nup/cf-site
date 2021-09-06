<?php
namespace App\Practice\AbstractFactory\Factory;

use App\Practice\AbstractFactory\Factory\AbstractPizzaIngredientFactory;


class ChicagoPizzaIngredientFactory extends AbstractPizzaIngredientFactory
{
    public function getLocation()
    {
        return 'Chicago';
    }

    public function createDough()
    {
        return 'Chicago Dough';
    }

    public function createSauce()
    {
        return 'Chicago Sauce';
    }

    public function createCheese()
    {
        return 'Chicago Cheese';
    }

    public function createVeggies()
    {
        return 'Chicago Veggies';
    }

    public function createPepperoni()
    {
        return 'Chicago Pepperoni';
    }

    public function createClam()
    {
        return 'Chicago Clam';
    }

}