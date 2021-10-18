<?php
namespace App\Practice\Command;

use App\Practice\Command\NoCommand;
use App\Practice\Command\CommandInterface;

class SimpleRemoteControl
{
    private $slotOn = [];
    private $slotOff = [];
    private $undoCommand;

    public function __construct()
    {
        $slotCount = 6;
        $noCommand = new NoCommand();
        for ($i = 0; $i < $slotCount; $i++) {
            $this->slotOn[] = $noCommand;
            $this->slotOff[] = $noCommand;
        }
        $this->undoCommand = $noCommand;
    }

    public function setCommand($slot, CommandInterface $commandOn, CommandInterface $commandOff)
    {
        $this->slotOn[$slot] = $commandOn;
        $this->slotOff[$slot] = $commandOff;
    }

    public function onButtonWasPressed($slot)
    {
        $this->slotOn[$slot]->execute();
        $this->undoCommand = $this->slotOn[$slot];
    }

    public function offButtonWasPressed($slot)
    {
        $this->slotOff[$slot]->execute();
        $this->undoCommand = $this->slotOff[$slot];
    }

    public function undoButtonWasPushed()
    {
        $this->undoCommand->undo();
    }
}