<?php

namespace App\Http\Controllers\Web\Practice\Pattern;

use App\Http\Controllers\Controller;
use App\Practice\Observer\WeatherData;
use App\Practice\Observer\CurrentDetailDisplay;
use App\Practice\Observer\CurrentConditionsDisplay;

class ObserverController extends Controller
{
    public function index()
    {
        $weatherData = app(WeatherData::class);
        $currentConditionsDisplay = new CurrentConditionsDisplay($weatherData);
        $currentDetailDisplay = new CurrentDetailDisplay($weatherData);

        $weatherData->setMeasurements(80, 65, 30.4);
        $weatherData->setMeasurements(82, 70, 29.2);
    }
}
