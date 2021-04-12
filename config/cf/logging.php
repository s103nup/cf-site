<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Unexpected Exception Log Configuration
    |--------------------------------------------------------------------------
    | subject format: <project>-<desc>-<host>
    |
    */
    'unexpected' => [
        'mail' => [
            'recipient' => env('CUS_MAIL_EXCEPTION_RECIPIENT', 's103nup@gmail.com'),
            'subject' => [
                'desc' => env('CUS_MAIL_EXCEPTION_SUBJECT_DESC', 'Undefined Exception'),
                'project' => env('CUS_MAIL_EXCEPTION_SUBJECT_PROJECT'),
            ]
        ]
    ],
];
