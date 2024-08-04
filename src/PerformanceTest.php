<?php

namespace PhpBenchmarks;

abstract class PerformanceTest
{

    private const ITERATIONS = [1000, 10000, 100000, 500000, 1000000];

    protected $testData = null;

    protected function setup(): void {
        $this->testData = [];
        for ($i = 0; $i < 1000; ++$i) {
            $this->testData[] = rand();
        }
    }

    final public function run(): void
    {
        $this->setup();

        $results = new Result();

        $tests = array_filter(array_map(
            fn ($functionName) => str_starts_with($functionName, 'test') ? $functionName : null,
            get_class_methods($this)
        ));

        foreach (self::ITERATIONS as $iteration) {

            foreach ($tests as $function) {
                $parts = preg_split('/(?=[A-Z])/', $function);
                array_shift($parts);
                $name = implode(' ', $parts); //Useful Functions
                $result = $this->performTest(
                    fn () => $this->$function($this->testData),
                    $name,
                    $iteration
                );
                echo '.';
                $results->items[] = $result;
            }

        }

        $results->process();
    }

    private function performTest(callable $fn, string $name, int $iterations): ResultItem
    {
        $start = microtime(true);
        for ($i = 0; $i < $iterations; ++$i) {
            $fn($this->testData);
        }
        $finish = microtime(true);
        $duration = $finish-$start;

        return new ResultItem(
            $name,
            $iterations,
            $duration,
        );
    }
}