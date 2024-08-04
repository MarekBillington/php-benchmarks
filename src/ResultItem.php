<?php

namespace PhpBenchmarks;

readonly class ResultItem
{
    public function __construct(
        public string $name,
        public int $iterations,
        public float $time,
        public float $faster = 0,
    ) {}
}
