<?php

namespace PhpBenchmarks;

abstract class PerformanceTest
{

    private const ITERATIONS = [1000, 10000, 100000, 500000, 1000000];

    private const TEST_ITERATIONS = 10000;

    protected $testData = null;

    protected function setup(int $iterations): void {
        $this->testData = [];
        for ($i = 0; $i < $iterations; ++$i) {
            $this->testData[] = rand();
        }
    }

    final public function run(): void
    {
        
        $results = new Result();
        
        $tests = array_filter(array_map(
            fn ($functionName) => str_starts_with($functionName, 'test') ? $functionName : null,
            get_class_methods($this)
        ));

        
        foreach (self::ITERATIONS as $iteration) {
            $this->setup($iteration);

            foreach ($tests as $function) {
                $parts = preg_split('/(?=[A-Z])/', $function);
                array_shift($parts);
                $name = implode(' ', $parts); //Useful Functions
                $result = $this->performTest(
                    fn () => $this->$function($this->testData),
                    $name,
                );
                echo '.';
                $results->items[] = new ResultItem(
                    $name,
                    $iteration,
                    $result,
                );
            }

        }

        $results->process();
    }

    private function performTest(callable $fn, string $name): float
    {
        $start = microtime(true);
        for ($i = 0; $i < self::TEST_ITERATIONS; ++$i) {
            $fn($this->testData);
        }
        $finish = microtime(true);
        $duration = $finish-$start;

        return $duration;
    }
}