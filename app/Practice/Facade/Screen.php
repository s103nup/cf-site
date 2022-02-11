<?php

namespace App\Practice\Facade;

use App\Practice\Helper;

class Screen
{
    use Helper;

    public function down(): void
    {
        $this->echoWithEol('Screen down');
    }

    public function up(): void
    {
        $this->echoWithEol('Screen up');
    }
}