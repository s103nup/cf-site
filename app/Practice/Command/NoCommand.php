<?php
namespace App\Practice\Command;

use App\Practice\Command\CommandInterface;

class NoCommand implements CommandInterface
{
    public function execute(): void
    {
    }

    public function undo(): void
    {
    }
}