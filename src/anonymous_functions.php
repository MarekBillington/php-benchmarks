<?php

include '../test.php';

$array = [0, 5, 10, 25, 50, 100];

$results = new Result();

$testCases = [1000, 10000, 100000, 1000000, 2000000, 5000000, 10000000];

foreach ($testCases as $ints) {
    // Anonymous function
    $start = microtime(true);
    for ($i = 0; $i < $ints; ++$i) {
        fn () => shuffle($array);
    }

    $finish = microtime(true);
    $duration = $finish-$start;


    $results->items[] = new ResultItem(
        'Anonymous function',
        $ints,
        $duration,
    );


    // Anonymous static function
    $start = microtime(true);
    for ($i = 0; $i < $ints; ++$i) {
        static fn () => shuffle($array);
    }

    $finish = microtime(true);
    $duration = $finish-$start;
    $results->items[] = new ResultItem(
        'Static anonymous function',
        $ints,
        $duration,
    );

    // Anonymous longhand function
    $start = microtime(true);
    for ($i = 0; $i < $ints; ++$i) {
        function () {
            shuffle($array);
        };
    }

    $finish = microtime(true);
    $duration = $finish-$start;


    $results->items[] = new ResultItem(
        'Anonymous longhand function',
        $ints,
        $duration,
    );



    // Static Anonymous longhand function
    $start = microtime(true);
    for ($i = 0; $i < $ints; ++$i) {
        static function () {
            shuffle($array);
        };
    }

    $finish = microtime(true);
    $duration = $finish-$start;


    $results->items[] = new ResultItem(
        'Static Anonymous longhand function',
        $ints,
        $duration,
    );
}

$results->process();

