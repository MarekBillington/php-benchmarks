<?php

class Result {
    
    /** @param ResultItem[] $items */
    public function __construct(
        public array $items = [],
    ) {
    }

    public function process(): void
    {
        $fastest = [];

        foreach ($this->items as $result) {
            if (!isset($fastest[$result->iterations])) {
                $fastest[$result->iterations] = $result;
            } else {
                $record = $fastest[$result->iterations];
                $fastest[$result->iterations] = $record->time < $result->time ? $record : $result;
            }
            print_r(
                sprintf(
                    "%s (iterations: %s)\nResult: %s\n\n",
                    $result->name,
                    $result->iterations,
                    $result->time
                )
            );
        }


        print_r($fastest);
    }
}

readonly class ResultItem {
    public function __construct(
        public string $name,
        public int $iterations,
        public float $time,
        public float $faster = 0,
    ) {}
}