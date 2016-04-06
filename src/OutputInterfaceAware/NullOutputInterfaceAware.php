<?php

namespace Puzzle\Pieces\OutputInterfaceAware;

use Symfony\Component\Console\Output\OutputInterface;
use Puzzle\Pieces\OutputInterfaceAware;

class NullOutputInterfaceAware implements OutputInterfaceAware
{
    public function register(OutputInterface $output)
    {
    }
}
