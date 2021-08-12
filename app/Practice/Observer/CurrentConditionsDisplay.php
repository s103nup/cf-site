<?php
namespace App\Practice\Observer;

use App\Interfaces\Practice\Pattern\ObserverInterface;
use App\Interfaces\Practice\Pattern\DisplayElementInterface;
use App\Interfaces\Practice\Pattern\SubjectInterface;

class CurrentConditionsDisplay implements ObserverInterface, DisplayElementInterface
{
    private $temperature;
    private $humidity;
    private $weatherData;

    public function __construct(SubjectInterface $WeatherData)
    {
        $this->weatherData = $WeatherData;
        $this->weatherData->registerObserver($this);
    }

    public function display(): void
    {
        echo 'Current conditions: ' . $this->temperature . 'F derees and ' . $this->humidity . '% humidity' . '<br>';
    }

    public function update(float $temperature, float $humidity, float $pressure): void
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->display();
    }
}
