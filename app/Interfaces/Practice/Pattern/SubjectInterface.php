<?php
namespace App\Interfaces\Practice\Pattern;

use App\Interfaces\Practice\Pattern\ObserverInterface;

interface SubjectInterface
{
    public function registerObserver(ObserverInterface $observer): void;
    public function removeObserver(ObserverInterface $observer): void;
    public function notifyObservers(): void;
}