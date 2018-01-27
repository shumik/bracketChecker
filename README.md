Library for checking valid brackets depth in string.
========================
Example:

    use \BracketChecker\BracketChecker;

    require_once 'vendor/autoload.php';

    $checker = new BracketChecker();
    $checker->setString("()()(()(()())))");

    try {
        echo $checker->check() ? 'valid string' : 'invalid string';
    } catch (InvalidArgumentException $e) {
        echo 'Invalid string format';
    }

Tests:

    vendor/bin/phpunit --bootstrap vendor/autoload.php vendor/shumik/bracket-checker/tests/BracketCheckerTest.php 
