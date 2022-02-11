<?php

namespace App\Practice;

trait Helper
{
    /**
     * Append PHP_EOL to value
     *
     * @param  string|array $value
     * @return string
     */
    private function appendEol($value): string
    {
        $appended = '';
        if (gettype($value) === 'array') {
            foreach ($value as $row) {
                $appended .= $row . PHP_EOL;
            }
        } else {
            $appended = $value . PHP_EOL;
        }
        return $appended;
    }

    /**
     * Echo with PHP_EOL
     *
     * @param  string $value
     * @return void
     */
    private function echoWithEol(string $value): void
    {
        echo $this->appendEol($value);
    }
}
