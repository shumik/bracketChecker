<?php

namespace BracketChecker;

/**
 * Class BracketChecker
 *
 * @package BracketChecker
 */
class BracketChecker
{
    public $stringToCheck;
    private $validatePattern = '/^[\(\)\s\n\r\t]+$/';

    public function setString(string $string)
    {
        $this->stringToCheck = $string;

        return $this;
    }


    /**
     * Calls private checks for string format and bracket depth
     *
     * @throws \InvalidArgumentException
     * @return bool
     */
    public function check()
    {
        if (!$this->checkStringFormat()) {
            throw new \InvalidArgumentException();
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
        return preg_match($this->validatePattern, $this->stringToCheck) == 1;
    }

    /**
     * Check bracket depth
     *
     * @return bool
     */
    private function checkBrackets(){
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