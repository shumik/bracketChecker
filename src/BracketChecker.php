<?php

namespace BracketChecker;

/**
 * Class BracketChecker
 *
 * @package BracketChecker
 */
class BracketChecker
{
    /**
     * String to ckeck
     *
     * @var string
     */
    public $stringToCheck;

    /**
     * Pattern to check string format
     *
     * @var string
     */
    private $stringFormatPattern = '/^[\(\)\s\n\r\t]+$/';

    public function setString(string $string)
    {
        $this->stringToCheck = $string;

        return $this;
    }


    /**
     * Calls string check methods
     *
     * @return bool
     *
     * @throws InvalidStringException
     */
    public function check()
    {
        if (!$this->checkStringFormat()) {
            throw new InvalidStringException();
        }

        return $this->checkBrackets();
    }

    /**
     * Check if string contains illegal characters
     *
     * @return bool
     */
    private function checkStringFormat()
    {
        return preg_match($this->stringFormatPattern, $this->stringToCheck) == 1;
    }

    /**
     * Check bracket depth
     *
     * @return bool
     */
    private function checkBrackets()
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
}