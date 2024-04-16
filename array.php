<?php

require_once 'vendor/autoload.php';

use Ds\Vector;

$newList = [1, 3, 4];

$newList[] = 5;
$newList[2] = 10;

echo $newList[2] . PHP_EOL;

$vector = new Vector([1, 3, 4]);

$vector->push(5);
$vector->set(2, 10);

echo $vector->get(2) . PHP_EOL;
