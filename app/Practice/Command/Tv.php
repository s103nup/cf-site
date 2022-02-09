<?php
namespace App\Practice\Command;

class Tv
{
    private $description = '';

    public function __construct($description)
    {
        $this->description = $description;
    }

    public function on()
    {
        dump($this->description . ' TV on');
    }

    public function off()
    {
        dump($this->description . ' TV off');
    }
}