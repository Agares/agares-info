<?php
declare(strict_types = 1);

namespace Agares\Info\Domain;

use Traversable;

class Portfolio implements \Countable, \ArrayAccess, \IteratorAggregate
{
    /**
     * @var PortfolioItem[]
     */
    private $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new \RuntimeException('This collection is immutable.');
    }

    public function offsetUnset($offset)
    {
        throw new \RuntimeException('This collection is immutable.');
    }

    public function count()
    {
        return count($this->items);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}