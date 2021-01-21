<?php

namespace App\Http\Controllers\Api\Log;

use Illuminate\Http\Request;
use App\Services\DateService;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

final class ToolsController extends Controller
{
    /**
     * Date Service
     *
     * @var App\Services\DateService
     */
    private $dateService;
    
    public function __construct(DateService $dateService)
    {
        $this->dateService = $dateService;
    }

    public function legacyQuerySyncGenerator(Request $request)
    {
        $collection = 'event_log';
        $type = $request->input('type');
        $start = $this->dateService->toTimestampWithMicro($request->input('start'));
        $end = $this->dateService->toTimestampWithMicro($request->input('end'));
        $logData = $request->input('logData');

        $findSource = [
            'type' => '"type": "' . $type . '"',
            'date' => '"created_at": {$gt: ' . $start . ', $lt: ' . $end . '}',
            'logData' => '"log_data": /' . $logData . '/',
        ];
        $find = 'find({' . implode(',', $findSource) . '})';

        $dataSource = [
            'db',
            $collection,
            $find,
            'limit(1)',
            'pretty()',
        ];
        $syntax = [
            'data' => implode('.', $dataSource)
        ];
        
        $response = response()->json($syntax, Response::HTTP_OK);

        return $response;
    }
}
