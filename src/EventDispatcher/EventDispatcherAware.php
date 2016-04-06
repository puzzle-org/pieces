<?php

namespace Puzzle\Pieces\EventDispatcher;

trait EventDispatcherAware
{
    private
        $eventDispatcher;

    public function setEventDispatcher(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
        
        return $this;
    }
}
