<?php
namespace App\Practice\Command;

class Light
{
    private $description = '';

    public function __construct($description)
    {
        $this->description = $description;
    }

    public function on()
    {
        dump($this->description . ' Light on');
    }

    public function off()
    {
        dump($this->description . ' Light off');
    }
}