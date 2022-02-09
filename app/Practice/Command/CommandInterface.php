<?php
namespace App\Practice\Command;

interface CommandInterface
{
    public function execute(): void;
    public function undo(): void;
}