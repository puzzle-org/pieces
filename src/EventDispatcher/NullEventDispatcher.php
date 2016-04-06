<?php

namespace Puzzle\Pieces\EventDispatcher;

class NullEventDispatcher implements EventDispatcher
{
    public function dispatch($eventName, $event = null)
    {
        return $event;
    }

    public function addSubscriber($subscriber)
    {
    }
}
