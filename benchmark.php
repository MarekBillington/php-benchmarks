<?php

declare(strict_types=1);

include __DIR__."/vendor/autoload.php";

include "src/tests/AnonymousFunctions.php";

$test = new \PhpBenchmarks\Tests\ForLoops();

$test->run();