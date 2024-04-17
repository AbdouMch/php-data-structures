<?php

namespace App;

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
