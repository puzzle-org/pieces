<?php

namespace Puzzle\Pieces;

trait SanityCheck
{
    private function ensureStringOnlyContainsDigits($stringToCheck)
    {
        if(preg_match('~^\d+$~', $stringToCheck) !== 1)
        {
            throw new \InvalidArgumentException('String does not contain only integers');
        }
    }
    
    private function ensureIsPositiveInteger($toCheck)
    {
        if(! (is_int($toCheck) && $toCheck >= 0))
        {
            throw new \InvalidArgumentException('Value has to be a positive integer');
        }
    }
    
    private function ensureIsStrictPositiveInteger($toCheck)
    {
        if(! (is_int($toCheck) && $toCheck > 0))
        {
            throw new \InvalidArgumentException('Value has to be a strictly positive integer');
        }
    }
    
    private function ensureIsPositiveFloat($toCheck)
    {
        if(! (is_numeric($toCheck) && preg_match('~^(\d+)|(\d*\.\d+)$~', $toCheck) === 1 && $toCheck >= 0))
        {
            throw new \InvalidArgumentException('Value has to be a positive float');
        }
    }
    
    private function ensureIsBoolean($toCheck)
    {
        if(! is_bool($toCheck))
        {
            throw new \InvalidArgumentException('Value has to be a boolean');
        }
    }
}
