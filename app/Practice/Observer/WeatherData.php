<?php
namespace App\Practice\Observer;

use App\Interfaces\Practice\Pattern\SubjectInterface;
use App\Interfaces\Practice\Pattern\ObserverInterface;

class WeatherData implements SubjectInterface
{
    private $observers = [];

    private $temperature;

    private $humidity;

    private $pressure;

    public function registerObserver(ObserverInterface $observer): void
    {
        array_push($this->observers, $observer);
    }

    public function removeObserver(ObserverInterface $observe): void
    {
        if (($key = array_search($observe, $this->observers, true)) !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers(): void
    {
        foreach ($this->observers as $observe) {
            $observe->update($this->temperature, $this->humidity, $this->pressure);
        }
    }

    public function setMeasurements(float $temperature, float $humidity, float $pressure): void
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;

        $this->notifyObservers();
    }
}
