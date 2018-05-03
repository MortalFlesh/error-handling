<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// input
[$_, $emailValue] = $argv;

// application
use MF\ErrorHandling\Email\Entity\Email;

class MyException extends \Exception
{

    public function __construct(string $invalidEmailValue)
    {
        parent::__construct(sprintf('Email "%s" is not valid.', $invalidEmailValue));
    }
}

$emailFacade = new \MF\ErrorHandling\Email\Facade\EmailFacade();
try {
    $email = $emailFacade->createEmail($emailValue, function (string $emailValue): ?Email {
        throw new MyException($emailValue);
    });

    $result = $email
        ? $email->getValue()
        : 'Invalid';
} catch (MyException $e) {
    $result = $e->getMessage();
}

// output
echo sprintf('Value "%s" is email "%s".' . PHP_EOL, $emailValue, $result);
