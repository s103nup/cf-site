<?php
namespace App\Interfaces\Practice\Pattern;

interface ObserverInterface
{
    public function update(float $temperature, float $humidity, float $pressure): void;
}