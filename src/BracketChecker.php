<?php

namespace BracketChecker;
/**
 * Class BracketChecker
 *
 * @package BracketChecker
 */
class BracketChecker
{
    private $stringToCheck;
    private $validatePattern = '/^[\(\)\s\n\r\t]+$/';

    public function __construct(string $string)
    {
        $this->stringToCheck = $string;
        $this->validateString();
    }

    /**
     * Checks string for correct bracket placement
     *
     * @return bool
     */
    public function check()
    {
        $depth = 0;
        for ($i = 0; $i <= strlen($this->stringToCheck) - 1; $i++) {
            switch ($this->stringToCheck[$i]) {
                case '(':
                    $depth++;
                    break;
                case ')':
                    $depth--;
                    break;
            }
            if ($depth < 0) return False;
        }
        return $depth == 0 ? True : False;
    }

    /**
     * Check if string contains illegal characters
     *
     * @throws \InvalidArgumentException if check fails
     */
    private function validateString()
    {
        if (preg_match($this->validatePattern, $this->stringToCheck) == 0) {
            throw new \InvalidArgumentException('String contains invalid symbols');
        }
        return True;
    }
}