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

/**
 * @date 17 August 2024 - PHP v8.3.7
 * +--- Test Results ---------->
 * | Short Hand Anonymous Function       | 1000     | 0.067867994308472   |
 * | Static Shorthand Anonymous Function | 1000     | 0.067249059677124   |
 * | Longhand Anonymous Function         | 1000     | 0.066420793533325   |
 * | Static Longhand Anonymous Function  | 1000     | 0.066506147384644   |
 * | Short Hand Anonymous Function       | 10000    | 0.62877511978149    |
 * | Static Shorthand Anonymous Function | 10000    | 0.62842297554016    |
 * | Longhand Anonymous Function         | 10000    | 0.6291708946228     |
 * | Static Longhand Anonymous Function  | 10000    | 0.62874388694763    |
 * | Short Hand Anonymous Function       | 100000   | 7.2580280303955     |
 * | Static Shorthand Anonymous Function | 100000   | 7.5908279418945     |
 * | Longhand Anonymous Function         | 100000   | 7.6697199344635     |
 * | Static Longhand Anonymous Function  | 100000   | 7.3135468959808     |
 * | Short Hand Anonymous Function       | 500000   | 51.509052991867     |
 * | Static Shorthand Anonymous Function | 500000   | 56.3171210289       |
 * | Longhand Anonymous Function         | 500000   | 54.056409835815     |
 * | Static Longhand Anonymous Function  | 500000   | 55.028442144394     |
 * | Short Hand Anonymous Function       | 1000000  | 124.7127571106      |
 * | Static Shorthand Anonymous Function | 1000000  | 122.09730601311     |
 * | Longhand Anonymous Function         | 1000000  | 125.64865589142     |
 * | Static Longhand Anonymous Function  | 1000000  | 121.62783312798     |
 * +------------>
 *
 * +--- Fastest times per run --->
 * | Longhand Anonymous Function         | 1000     | 0.066420793533325   |
 * | Static Shorthand Anonymous Function | 10000    | 0.62842297554016    |
 * | Short Hand Anonymous Function       | 100000   | 7.2580280303955     |
 * | Short Hand Anonymous Function       | 500000   | 51.509052991867     |
 * | Static Longhand Anonymous Function  | 1000000  | 121.62783312798     |
 * +------------>
 *
 */