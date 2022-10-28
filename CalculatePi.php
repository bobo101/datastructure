<?php

$theValue = 1000000; // the max
$bottom = 1;
$pi = 0;
for ($i = 1; $i < $theValue; $i++) {
    if ($i % 2 == 1) {
        $pi += 4 / $bottom;
    } else {
        $pi -= 4 / $bottom;
    }
    $bottom += 2;
}

var_dump($pi); // 3.14169266359
var_dump(pi());