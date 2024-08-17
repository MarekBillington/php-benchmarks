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

/** @date 17 August 2024 - PHP 8.3.7
+--- Test Results ---------->
| Foreach                        | 1000     | 0.26000499725342    |
| Foreach Key                    | 1000     | 0.27937912940979    |
| Foreach Reference Value        | 1000     | 0.3729190826416     |
| For Loop                       | 1000     | 0.293123960495      |
| For With Count In Loop         | 1000     | 0.40873098373413    |
| For Loop With Increment Before | 1000     | 0.29700899124146    |
| Array Map                      | 1000     | 0.36654090881348    |
| Foreach                        | 10000    | 2.5264809131622     |
| Foreach Key                    | 10000    | 2.7440929412842     |
| Foreach Reference Value        | 10000    | 3.8120260238647     |
| For Loop                       | 10000    | 2.9930069446564     |
| For With Count In Loop         | 10000    | 4.1641938686371     |
| For Loop With Increment Before | 10000    | 2.9797070026398     |
| Array Map                      | 10000    | 3.7607169151306     |
| Foreach                        | 100000   | 26.173994064331     |
| Foreach Key                    | 100000   | 28.320061922073     |
| Foreach Reference Value        | 100000   | 39.406699895859     |
| For Loop                       | 100000   | 30.168387889862     |
| For With Count In Loop         | 100000   | 42.208657979965     |
| For Loop With Increment Before | 100000   | 29.831691026688     |
| Array Map                      | 100000   | 38.163311958313     |
| Foreach                        | 500000   | 131.91407608986     |
| Foreach Key                    | 500000   | 139.92178297043     |
| Foreach Reference Value        | 500000   | 196.73906588554     |
| For Loop                       | 500000   | 148.22741293907     |
| For With Count In Loop         | 500000   | 206.08273506165     |
| For Loop With Increment Before | 500000   | 148.47380495071     |
| Array Map                      | 500000   | 186.57349896431     |
| Foreach                        | 1000000  | 258.10387301445     |
| Foreach Key                    | 1000000  | 281.08262395859     |
| Foreach Reference Value        | 1000000  | 394.01384997368     |
| For Loop                       | 1000000  | 423.54712295532     |
| For With Count In Loop         | 1000000  | 415.84239792824     |
| For Loop With Increment Before | 1000000  | 302.69379210472     |
| Array Map                      | 1000000  | 381.06765389442     |
    +------------>

+--- Fastest times per run --->
| Foreach                        | 1000     | 0.26000499725342    |
| Foreach                        | 10000    | 2.5264809131622     |
| Foreach                        | 100000   | 26.173994064331     |
| Foreach                        | 500000   | 131.91407608986     |
| Foreach                        | 1000000  | 258.10387301445     |
+------------>
*/
