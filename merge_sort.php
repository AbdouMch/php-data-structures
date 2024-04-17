<?php

require_once (__DIR__).'/src/merge_sort.php';

$array = [99, 8, 44, 30, 34, 96, 69, 3, 1, 2, 4];
echo '[' . implode(', ', $array) . ']' . PHP_EOL;
echo (verifySorted($array) ? 'true' : 'false') . PHP_EOL;

echo "Sorting ..." . PHP_EOL;

$sorted = mergeSort($array);

echo '[' . implode(', ', $sorted) . ']' . PHP_EOL;
echo (verifySorted($sorted) ? 'true' : 'false') . PHP_EOL;
