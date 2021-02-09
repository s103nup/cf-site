<?php
namespace App\Handlers;

use Exception;
use App\Mail\UnexpectedLog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Monolog\Handler\AbstractProcessingHandler;

class LogMailerHandler extends AbstractProcessingHandler
{
    /**
     * Writes the record down to the log of the implementing handler
     *
     * @param array $record
     */
    protected function write(array $record): void
    {
        try {
            Mail::send(new UnexpectedLog($record));
        } catch (Exception $e) {
            Log::channel('daily')->error($e);
        }
    }
}
