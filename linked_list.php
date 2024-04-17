<?php

require_once 'vendor/autoload.php';

use App\LinkedList;
use App\Node;

$n1 = new Node(10);
$n2 = new Node(9);
$n1->nextNode = $n2;
echo $n1 . PHP_EOL;
echo $n1->nextNode . PHP_EOL;

$linkedList = new LinkedList();

echo "size is " . $linkedList->size() . PHP_EOL;

$linkedList->head = $n1;

echo "size is " . $linkedList->size() . PHP_EOL;

$n3 = new Node(20);

$linkedList->head = $n3;

echo "size is " . $linkedList->size() . PHP_EOL;

$n3->nextNode = $n1;

echo "size is " . $linkedList->size() . PHP_EOL;

echo $linkedList . PHP_EOL;

$linkedList = new LinkedList();

$linkedList
    ->add(12)
    ->add(20)
    ->add(30)
    ;
echo "size is " . $linkedList->size() . PHP_EOL;

echo $linkedList . PHP_EOL;

echo "search 12 : " . (null !== $linkedList->search(12) ? 'found' : 'not found') . PHP_EOL;
echo "search 300 : " . (null !== $linkedList->search(300) ? 'found' : 'not found') . PHP_EOL;

$linkedList = new LinkedList();

$linkedList
    ->add(30)
    ->add(20)
    ->add(10)
    ;

echo $linkedList . PHP_EOL;

$linkedList->insert(15, 1);

echo $linkedList . PHP_EOL;

$linkedList->insert(5, 0);

echo $linkedList . PHP_EOL;

$linkedList->insert(40, 5);

echo $linkedList . PHP_EOL;

$removed = $linkedList->removeByIndex(0);

echo "removed node " . $removed . " at index 0". PHP_EOL;
echo $linkedList . PHP_EOL;

$removed = $linkedList->removeByIndex(4);

echo "removed node " . $removed . " at index 4". PHP_EOL;
echo $linkedList . PHP_EOL;

$linkedList->removeByIndex(1);

echo $linkedList . PHP_EOL;


echo "Remove By value" . PHP_EOL;


$linkedList = new LinkedList();

$linkedList
    ->add(30)
    ->add(30)
    ->add(20)
    ->add(5)
    ->add(20)
    ->add(10)
    ->add(10)
;

echo $linkedList . PHP_EOL;

$linkedList->remove(30);


echo $linkedList . PHP_EOL;

$linkedList->removeAll(30);


echo $linkedList . PHP_EOL;

$linkedList->removeAll(10);

echo $linkedList . PHP_EOL;

$linkedList->removeAll(20);

echo $linkedList . PHP_EOL;


$linkedList->removeAll(5);

echo $linkedList . PHP_EOL;
