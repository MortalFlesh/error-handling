<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// input
[$_, $emailValue] = $argv;

// application
use MF\ErrorHandling\Email\Entity\Email;

class InvalidEmail extends \MF\ErrorHandling\Email\Entity\Email
{
    public function __construct()
    {
        parent::__construct('Invalid');
    }
}

$emailFacade = new \MF\ErrorHandling\Email\Facade\EmailFacade();
$email = $emailFacade->createEmail($emailValue, function (string $emailValue): ?Email {
    return new InvalidEmail();
});

$result = $email
    ? $email->getValue()
    : 'Invalid - but this should never happened.';

// output
echo sprintf('Value "%s" is email "%s".' . PHP_EOL, $emailValue, $result);
