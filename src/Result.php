<?php

namespace PhpBenchmarks;

class Result {
    
    /** @param ResultItem[] $items */
    public function __construct(
        public array $items = [],
    ) {
    }

    public function process(): void
    {
        $fastest = [];
        $col1Size = 0;
        $col2Size = 8;
        $col3Size = 19;

        echo "\n+--- Test Results ---------->\n";

        foreach ($this->items as $result) {
            if (!isset($fastest[$result->iterations])) {
                $fastest[$result->iterations] = $result;
            } else {
                $record = $fastest[$result->iterations];
                $fastest[$result->iterations] = $record->time < $result->time ? $record : $result;
            }
            $col1Size = strlen($result->name) > $col1Size ? strlen($result->name) : $col1Size;
            // $col2Size = strlen( (string) $result->iterations) > $col3Size ? strlen( (string) $result->iterations) : $col2Size;
            // $col3Size = strlen($result->time) > $col3Size ? strlen($result->time) : $col3Size;
        }

        foreach ($this->items as $result) {
            print_r(sprintf(
                "| %s | %s | %s |\n",
                str_pad($result->name, $col1Size),
                str_pad($result->iterations, $col2Size),
                str_pad($result->time, $col3Size),
            ));
        }
        echo "+------------>";
        echo "\n\n+--- Fastest times per run --->\n";

        foreach ($fastest as $case) {
            print_r(
                sprintf(
                    "| %s | %s | %s |\n",
                    str_pad($case->name, $col1Size),
                    str_pad($case->iterations, $col2Size),
                    str_pad($case->time, $col3Size)
                )
            );
        }
        echo "+------------>\n";
    }
}
