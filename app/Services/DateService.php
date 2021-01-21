<?php
namespace App\Services;

use Illuminate\Support\Carbon;

class DateService
{
    /**
     * Transform to timestamp with microsecond
     *
     * @param  string $dateString
     * @return double
     */
    public function toTimestampWithMicro(String $dateString)
    {
        $instance = Carbon::parse($dateString);

        return (double) $instance->timestamp . '.' . $instance->micro;
    }
}