<?php

namespace Tests\Feature;

use Tests\TestCase;

class LogToolsTest extends TestCase
{
    public function testGenerateLegacyDataMongodbQuerySync()
    {
        // input
        $url = route('v1.legacy-query-sync-generator');
        $queryData = [
            'type' => 'test',
            'start' => '2021/01/20 00:00:00',
            'end' => '2021/01/21 00:00:00',
            'logData' => '20210120091746',
        ];
        $queryString = http_build_query($queryData);

        // expected
        $findSource = [
            'type' => '"type": "' . $queryData['type'] . '"',
            'date' => '"created_at": {$gt: 1611072000.0, $lt: 1611158400.0}',
            'logData' => '"log_data": /' . $queryData['logData'] . '/',
        ];
        $find = 'find({' . implode(',', $findSource) . '})';
        $dataSource = [
            'db',
            'event_log',
            $find,
            'limit(1)',
            'pretty()',
        ];
        $expected = [
            'data' => implode('.', $dataSource)
        ];

        // actual
        $response = $this->get($url . '?' . $queryString);
        
        // assert
        $response->assertStatus(200);
        $response->assertJsonFragment($expected);
    }
}
