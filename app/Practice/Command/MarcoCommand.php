<?php
namespace App\Practice\Command;

use App\Practice\Command\CommandInterface;

class MarcoCommand implements CommandInterface
{
    private $commands;

    public function __construct(Array $commands)
    {
        $this->commands = $commands;
    }

    public function execute(): void
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }

    public function undo(): void
    {
        foreach ($this->commands as $command) {
            $command->undo();
        }
    }
}