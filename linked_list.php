<?php

class Node
{
    public ?Node $nextNode = null;

    public function __construct(
        public int $data
    )
    {
    }

    public function getData(): int
    {
        return $this->data;
    }

    public function __toString(): string
    {
        return "<NODE data: $this->data>";
    }
}

/**
 * Singly linked list
 * Each node has a reference to the next node
 * The list has a reference to the head
 */
class LinkedList
{
    public function __construct(
        public ?Node $head = null
    ) {
    }

    /**
     * Add a node at the head of the list
     * Take O(1) time (constant time)
     */
    public function add(int $data): self
    {
        $node = new Node($data);
        $node->nextNode = $this->head;
        $this->head = $node;

        return $this;
    }

    public function isEmpty(): bool
    {
        return null === $this->head;
    }

    /**
     * Returns the size of nodes in the list takes O(n) time (linear time)
     */
    public function size(): int
    {
        $current = $this->head;
        $count = 0;

        while (null !== $current) {
            $count++;
            $current = $current->nextNode;
        }

        return $count;
    }

    public function __toString()
    {
        $rep = [];

        $current = $this->head;

        while (null !== $current) {
            if ($current === $this->head) {
                $rep[] = "[Head: $current]";
            } elseif (null === $current->nextNode) {
                $rep[] = "[Tail: $current]";
            } else {
                $rep[] = "[$current]";
            }
            $current = $current->nextNode;
        }

        return implode('->', $rep);
    }
}

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
