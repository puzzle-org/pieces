<?php

namespace Puzzle\Pieces\EventDispatcher\Adapters;

use Puzzle\Pieces\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\EventDispatcher\Event;

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
        $event = $event ?? new Event();
        return $this->eventDispatcher->dispatch($event, $eventName);
    }
    
    public function addSubscriber($subscriber)
    {
        $this->eventDispatcher->addSubscriber($subscriber);
    }
}
