<?php
namespace App\Practice\AbstractFactory\Factory;

use App\Practice\AbstractFactory\Factory\AbstractPizzaIngredientFactory;

class NyPizzaIngredientFactory extends AbstractPizzaIngredientFactory
{
    public function getLocation()
    {
        return 'NY';
    }

    public function createDough()
    {
        return 'NY Dough';
    }

    public function createSauce()
    {
        return 'NY Sauce';
    }

    public function createCheese()
    {
        return 'NY Cheese';
    }

    public function createVeggies()
    {
        return 'NY Veggies';
    }

    public function createPepperoni()
    {
        return 'NY Pepperoni';
    }

    public function createClam()
    {
        return 'NY Clam';
    }

}