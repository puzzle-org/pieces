<?php

namespace Puzzle\Pieces;

use Symfony\Component\Console\Output\OutputInterface;

interface OutputInterfaceAware
{
    public function register(OutputInterface $output);
}