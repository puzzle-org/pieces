<?php

namespace Puzzle\Pieces;

use Symfony\Component\Console\Output\OutputInterface;

trait ExtraInformation
{
    private
        $startTime,
        $endTime;

    private function startTimer()
    {
        $this->startTime = microtime(true);
    }

    private function endTimer()
    {
        $this->endTime = microtime(true);
    }

    private function outputExtraInformation(OutputInterface $output)
    {
        $verbosity = $output->getVerbosity();

        if($verbosity < OutputInterface::VERBOSITY_VERBOSE)
        {
            return;
        }

        $output->writeln(sprintf(
            '<comment>Max memory usage : %s Ko',
            round(memory_get_peak_usage() / 1024)
        ));

        $executionTime = $this->endTime - $this->startTime;

        $output->writeln(sprintf(
            'Execution time : %s s</comment>',
            round($executionTime, 2)
        ));
    }
}
