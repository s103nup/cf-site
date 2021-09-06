<?php
namespace App\Practice\AbstractFactory\Factory;

abstract class AbstractPizzaIngredientFactory
{
    abstract public function getLocation();
    abstract public function createDough();
    abstract public function createSauce();
    abstract public function createCheese();
    abstract public function createVeggies();
    abstract public function createPepperoni();
    abstract public function createClam();
}