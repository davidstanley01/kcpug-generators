#!/usr/bin/env php
<?php

// fizzbuzz classic (tm) 
// courtesy of Jeff Madsen (https://gist.github.com/jrmadsen67/5815505)
function old_fizz_buzz($max) {
    $all_numbers = range(0, $max);
    $threes      = array_fill_keys(range(3, $max, 3), 'Fizz'); 
    $fives       = array_fill_keys(range(5, $max, 5), 'Buzz'); 
    $fifteens    = array_fill_keys(range(15, $max, 15), 'FizzBuzz'); 

    return array_replace($all_numbers, $threes, $fives, $fifteens);
}

$startTime = microtime(true);
$num = $argv[1];

foreach (old_fizz_buzz($num) as $value) { 
    // don't do anything, just iterate through
    // echo "$value\n";
}

$endTime = microtime(true);

// get our stats...
$memory = number_format((memory_get_peak_usage() / 1024 / 1024), 2);
$time = $endTime - $startTime;

echo "Execution time - $time \nMax memory used - $memory MB";
