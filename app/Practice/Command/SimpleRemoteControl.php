<?php
namespace App\Practice\Command;

use App\Practice\Command\CommandInterface;

class SimpleRemoteControl
{
    private $slotOn = [];
    private $slotOff = [];

    public function setCommand($slot, CommandInterface $commandOn, CommandInterface $commandOff)
    {
        $this->slotOn[$slot] = $commandOn;
        $this->slotOff[$slot] = $commandOff;
    }

    public function onButtonWasPressed($slot)
    {
        $this->slotOn[$slot]->execute();
    }

    public function offButtonWasPressed($slot)
    {
        $this->slotOff[$slot]->execute();
    }
}