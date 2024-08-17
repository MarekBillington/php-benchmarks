<?php

declare(strict_types=1);

namespace PhpBenchmarks\tests;

use PhpBenchmarks\PerformanceTest;

final class StringConcatenation extends PerformanceTest
{

    public function testDotConcatenation($array)
    {
        $str = '';
        foreach ($array as $a) {
            $str .= $a;
        }
    }
}
