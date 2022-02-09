<?php

namespace App\Practice\Singleton;

use Illuminate\Support\Str;

class Singleton
{
    private static $uniqueInstance;
    private $id;

    private function __construct()
    {
        $this->id = Str::uuid();
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$uniqueInstance)) {
            self::$uniqueInstance = new Singleton();
        }
        return self::$uniqueInstance;
    }

    public function printId()
    {
        dump($this->id->toString());
    }
}
