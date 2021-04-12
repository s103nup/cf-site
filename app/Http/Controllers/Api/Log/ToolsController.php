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
        $findSource = [];

        if ($request->has('logType')) {
            $type = $request->input('logType');
            data_set($findSource, 'type', '"type": "' . $type . '"');
        }

        if ($request->has('startDate') && $request->has('endDate')) {
            $start = $this->dateService->toTimestampWithMicro($request->input('startDate'));
            $end = $this->dateService->toTimestampWithMicro($request->input('endDate'));
            data_set($findSource, 'date', '"created_at": {$gt: ' . $start . ', $lt: ' . $end . '}',);
        }

        if ($request->has('logData') && $request->filled('logData')) {
            $logData = $request->input('logData');
            data_set($findSource, 'logData', '"log_data": /' . $logData . '/');
        }

        $find = 'find()';
        if ($findSource !== []) {
            $find = 'find({' . implode(',', $findSource) . '})';
            unset($findSource);
        }

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
