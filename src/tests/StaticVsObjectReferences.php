<?php

namespace PhpBenchmarks\tests;

use PhpBenchmarks\PerformanceTest;

final class StaticVsObjectReferences extends PerformanceTest
{

    public function testStaticFunctionCall(array $array)
    {
        static::staticTest($array);
    }

    public function testObjectFunctionCall(array $array)
    {
        $this->objectTest($array);
    }

    public function testStaticCallOnNonStaticFunction(array $array)
    {
        static::objectTest($array);
    }

    protected static function staticTest($array)
    {
        shuffle($array);
    }

    protected function objectTest($array)
    {
        shuffle($array);
    }
}

/** @date 17 August 2024 - PHP v8.3.7
+--- Test Results ---------->
| Static Function Call               | 1000     | 0.069470882415771   |
| Object Function Call               | 1000     | 0.065570116043091   |
| Static Call On Non Static Function | 1000     | 0.065678119659424   |
| Static Function Call               | 10000    | 0.62800192832947    |
| Object Function Call               | 10000    | 0.62729907035828    |
| Static Call On Non Static Function | 10000    | 0.63061881065369    |
| Static Function Call               | 100000   | 7.3815321922302     |
| Object Function Call               | 100000   | 7.5705809593201     |
| Static Call On Non Static Function | 100000   | 7.571702003479      |
| Static Function Call               | 500000   | 52.790084123611     |
| Object Function Call               | 500000   | 53.761590957642     |
| Static Call On Non Static Function | 500000   | 51.564226150513     |
| Static Function Call               | 1000000  | 121.24495196342     |
| Object Function Call               | 1000000  | 121.29587602615     |
| Static Call On Non Static Function | 1000000  | 119.8917620182      |
+------------>

+--- Fastest times per run --->
| Object Function Call               | 1000     | 0.065570116043091   |
| Object Function Call               | 10000    | 0.62729907035828    |
| Static Function Call               | 100000   | 7.3815321922302     |
| Static Call On Non Static Function | 500000   | 51.564226150513     |
| Static Call On Non Static Function | 1000000  | 119.8917620182      |
+------------>

 */