<?php
namespace App\Practice\Observer;

use App\Interfaces\Practice\Pattern\ObserverInterface;
use App\Interfaces\Practice\Pattern\DisplayElementInterface;
use App\Interfaces\Practice\Pattern\SubjectInterface;

class CurrentDetailDisplay implements ObserverInterface, DisplayElementInterface
{
    private $temperature;
    private $humidity;
    private $pressure;
    private $weatherData;

    public function __construct(SubjectInterface $WeatherData)
    {
        $this->weatherData = $WeatherData;
        $this->weatherData->registerObserver($this);
    }

    public function display(): void
    {
        dump('Detail conditions: ' . $this->temperature . 'F derees and ' . $this->humidity . '% humidity and pressure ' . $this->pressure);
    }

    public function update(float $temperature, float $humidity, float $pressure): void
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->display();
    }
}
