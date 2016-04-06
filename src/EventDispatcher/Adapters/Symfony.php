<?php

namespace Puzzle\Pieces\EventDispatcher\Adapters;

use Puzzle\Pieces\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Symfony implements EventDispatcher
{
    private
        $eventDispatcher;
    
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
    
    public function dispatch($eventName, $event = null)
    {
        return $this->eventDispatcher->dispatch($eventName, $event);
    }
    
    public function addSubscriber($subscriber)
    {
        $this->eventDispatcher->addSubscriber($subscriber);
    }
}
