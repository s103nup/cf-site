<?php

namespace App\Http\Controllers\Web\Practice;

use Faker\Generator;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
    public function exportCsv(Generator $faker)
    {
        $fileName = 'example.csv';
        $count = 3;
        $exampledata = [];
        for ($i = 0; $i < $count; $i++) {
            array_push($exampledata, [
                'Name' => $faker->name,
                'Age' => $faker->numberBetween(1, 100),
                'Address' => $faker->streetAddress,
            ]);
        }

        $headers = array(
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $fileName,
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0'
        );

        $columns = array_keys(Arr::first($exampledata));
        $callback = function () use ($exampledata, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($exampledata as $row) {
                fputcsv($file, array_values($row));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
