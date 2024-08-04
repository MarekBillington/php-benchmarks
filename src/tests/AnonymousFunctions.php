<?php

namespace PhpBenchmarks\Tests;

use PhpBenchmarks\PerformanceTest;

final class AnonymousFunctions extends PerformanceTest
{

    public function testShortHandAnonymousFunction(array $array)
    {
        $fn = fn () => shuffle($array);
        $fn();
    }

    public function testStaticShorthandAnonymousFunction(array $array)
    {
        $fn = static fn () => shuffle($array);
        $fn();
    }

    public function testLonghandAnonymousFunction(array $array)
    {
        $fn = function () use ($array) {
            shuffle($array);
        };
        $fn();
    }

    public function testStaticLonghandAnonymousFunction(array $array)
    {
        $fn = static function () use ($array) {
            shuffle($array);
        };
        $fn();
    }
}
