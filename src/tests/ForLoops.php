<?php

namespace PhpBenchmarks\Tests;

use PhpBenchmarks\PerformanceTest;

final class ForLoops extends PerformanceTest
{

    public function testForeach(array $array)
    {
        foreach ($array as $value) {
            $value = ceil($value % 3) * 2 +5;
        }
    }

    public function testForeachKey(array $array)
    {
        foreach ($array as $key => $value) {
            $value = ceil($value % 3) * 2 +5;
        }
    }

    public function testForeachReferenceValue(array $array)
    {
        foreach ($array as $key => &$value) {
            $value = ceil($value % 3) * 2 +5;
        }
    }

    public function testForLoop(array $array)
    {
        $count = count($array);
        for ($i = 0; $i < $count; $i++) {
            $value = $array[$i];
            $value = ceil($value % 3) * 2 + 5;
        }
    }

    public function testForWithCountInLoop(array $array)
    {
        for ($i = 0; $i < count($array); $i++) {
            $value = $array[$i];
            $value = ceil($value % 3) * 2 + 5;
        }
    }

    public function testForLoopWithIncrementBefore(array $array)
    {
        $count = count($array);
        for ($i = 0; $i < $count; ++$i) {
            $value = $array[$i];
            $value = ceil($value % 3) * 2 + 5;
        }
    }

    public function testArrayMap(array $array)
    {
        array_map(static fn ($value) => ceil($value % 3) * 2 + 5, $array);
    }
}