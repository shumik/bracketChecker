<?php

use BracketChecker\BracketChecker;

use PHPUnit\Framework\TestCase;

class BracketCheckerTest extends TestCase
{

    public function testSetString()
    {
        $checker = new BracketChecker();
        $testString = 'StringToCheckSetStringMethod';
        $checker->setString($testString);
        $this->assertEquals($checker->setString($testString)->stringToCheck, $testString);
    }

    public function testCheck()
    {
        $checker = new BracketChecker();
        $stringValid = "()()\t(( ()( )(\r()( ))) ())\n";
        $stringInvalidBrackets = $stringValid . '(';
        $stringInvalidFormat = $stringValid . 1;

        $checker->setString($stringValid);
        $this->assertEquals($checker->check(), true);

        $checker->setString($stringInvalidBrackets);
        $this->assertEquals($checker->check(), false);

        $checker->setString($stringInvalidFormat);
        $this->expectException(\InvalidArgumentException::class);
        $checker->check();
    }


}
