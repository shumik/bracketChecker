<?php


namespace BracketChecker;

/**
 * Exception thrown when string has invalid format
 *
 * Class InvalidStringException
 * @package BracketChecker
 */
class InvalidStringException extends \Exception
{
    /**
     * Exception message
     *
     * @var string
     */
    public $message = 'Invalid string format';
}