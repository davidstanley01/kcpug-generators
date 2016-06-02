#!/usr/bin/env php
<?php

// use the yield
function new_fizz_buzz($max) {
    for ($i = 0; $i < $max; $i++) {
        $val = $i % 3 === 0 ? 'Fizz' : $i;
        $val = $i % 5 === 0 ? 'Buzz' : $val;
        $val = $i % 15 === 0 ? 'FizzBuzz' : $val;

        yield $val;
    }
}

$startTime = microtime(true);
$num = $argv[1];

foreach (new_fizz_buzz($num) as $value) {
    // don't do anything, just iterate through
    // echo "$value\n";
}

$endTime = microtime(true);

// get our stats...
$memory = number_format((memory_get_peak_usage() / 1024 / 1024), 2);
$time = $endTime - $startTime;

echo "Execution time - $time \nMax memory used - $memory MB";
