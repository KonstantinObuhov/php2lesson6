<?php

namespace App;

class MultiException
    extends \Exception
    implements \Iterator
{
    protected $collection = [];

    public function add(\Exception $e)
    {
        $this->collection[] = $e;
    }

    public function isEmpty()
    {
        return 0 == count($this->collection);
    }

    public function current()
    {
        return current($this->collection);
    }

    public function next()
    {
        next($this->collection);
    }

    public function key()
    {
        return key($this->collection);
    }

    public function valid()
    {
        return null !== key($this->collection);
    }

    public function rewind()
    {
        return reset($this->collection);
    }
}