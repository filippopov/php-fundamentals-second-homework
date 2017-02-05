<?php
$numberOne = intval(fgets(STDIN));
$numberTwo = intval(fgets(STDIN));
$numberThree = intval(fgets(STDIN));

$largestFromTwoNumbers = max($numberOne, $numberTwo);
$largest = max($largestFromTwoNumbers, $numberThree);

echo "Max: $largest";