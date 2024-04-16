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
     * returns the first occurrence of a value in the list
     * returns null if the value not found
     * takes O(n) time
     */
    public function search(int $value): ?Node
    {
        $current = $this->head;

        while (null !== $current) {
            if ($value === $current->data) {
                return  $current;
            }
            $current = $current->nextNode;
        }

        return null;
    }

    /**
     * Inserts a new node at index position
     * Insertion takes O(1) time but finding the position is O(n) time
     * So the insertion method takes O(n) time
     */
    public function insert(int $data, int $index): self
    {
        if (0 === $index) {
            $this->add($data);
            return $this;
        }

        $position = $index;
        $current = $this->head;

        while ($position > 1 && null !== $current) {
            $current = $current->nextNode;
            $position--;
        }

        if (null === $current) {
            throw new Exception("out of range index!");
        }

        $new = new Node($data);
        $previous = $current;
        $next = $current->nextNode;
        $previous->nextNode = $new;
        $new->nextNode = $next;

        return $this;
    }

    /**
     * Removes a node by value
     * Returns the node or null if not found
     * Takes O(n) time
     */
    public function removeByIndex(int $index): ?Node
    {
        if (0 === $index) {
            $removed = $this->head;
            $this->head = $this->head->nextNode;

            return $removed;
        }

        $position = $index;
        $current = $this->head;

        while ($position > 1 && null !== $current) {
            $current = $current->nextNode;
            $position--;
        }

        if (null === $current) {
            throw new Exception("out of range index!");
        }

        $previous = $current;
        $toRemove = $current->nextNode;
        $next = $toRemove->nextNode;
        $previous->nextNode = $next;

        return $toRemove;
    }

    /**
     * Removes a node by value
     * Returns the node or null if not found
     * Takes O(n) time
     */
    public function remove(int $data): ?Node
    {
        $previous = null;
        $current = $this->head;
        $found = false;

        while (null !== $current && false === $found) {
            if ($data === $current->data && $current === $this->head) {
                $this->head = $current->nextNode;
                $found = true;
            } elseif ($data === $current->data) {
                $previous->nextNode = $current->nextNode;
                $found = true;
            }

            $previous = $current;
            $current = $current->nextNode;
        }

        if ($found) {
            return $current;
        }

        return null;
    }

    public function removeAll(int $data): self
    {
        $previous = null;
        $current = $this->head;

        while (null !== $current) {
            if ($data === $current->data) {
                $next = $current->nextNode;
                if (null !== $previous) {
                    $previous->nextNode = $next;
                } else {
                    $this->head = $next;
                }
            } else {
                $previous = $current;
            }
            $current = $current->nextNode;
        }

        return $this;
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
        if (null === $this->head) {
            return 'empty list';
        }

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