<?php
namespace App\Practice\Command;

class CeilingFan {
    public const HIGH = 3;
    public const MEDIUM = 2;
    public const LOW = 1;
    public const OFF = 0;

    private $location;
    private $speed;

    public function __construct(string $location)
    {
        $this->location = $location;
        $this->speed = self::OFF;
    }

    public function high(): void
    {
        $this->speed = self::HIGH;
        dump($this->location . ' ceiling fan is on high');
    }

    public function medium(): void
    {
        $this->speed = self::MEDIUM;
        dump($this->location . ' ceiling fan is on medium');
    }

    public function low(): void
    {
        $this->speed = self::LOW;
        dump($this->location . ' ceiling fan is on low');
    }

    public function off(): void
    {
        $this->speed = self::OFF;
        dump($this->location . ' ceiling fan is off');
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }
}