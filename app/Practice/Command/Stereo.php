<?php
namespace App\Practice\Command;

class Stereo
{
    private $description = '';

    public function __construct($description)
    {
        $this->description = $description;
    }

    public function on()
    {
        dump($this->description . ' Stereo on');
    }

    public function off()
    {
        dump($this->description . ' Stereo off');
    }

    public function setCd()
    {
        dump($this->description . ' Stereo set CD');
    }

    public function setDvd()
    {
        dump($this->description . ' Stereo set DVD');
    }

    public function setRadio()
    {
        dump($this->description . ' Stereo set Radio');
    }

    public function setVoice($voice)
    {
        dump($this->description . ' Stereo set voide ' . $voice);
    }
}