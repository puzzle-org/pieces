<?php

namespace Puzzle\Pieces\EventDispatcher;

interface EventDispatcher
{
    public function dispatch($eventName, $event = null);
    
    public function addSubscriber($subscriber);
}
