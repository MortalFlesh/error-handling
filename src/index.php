<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// input
[$_, $emailValue] = $argv;

// application
use MF\ErrorHandling\Email\Entity\Email;

$emailFacade = new \MF\ErrorHandling\Email\Facade\EmailFacade();
$email = $emailFacade->createEmail($emailValue, function(string $emailValue): ?Email {
    // I don't care...
    return null;
});

$result = $email
    ? $email->getValue()
    : 'Invalid';

// output
echo sprintf('Value "%s" is email "%s".' . PHP_EOL, $emailValue, $result);
