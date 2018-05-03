<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// input
[$_, $emailValue] = $argv;

// application
$emailFacade = new \MF\ErrorHandling\Email\Facade\EmailFacade();
try {
    $email = $emailFacade->createEmail($emailValue);

    $result = $email
        ? $email->getValue()
        : 'Invalid';
} catch (\Throwable $e) {
    $result = 'Invalid';
}

// output
echo sprintf('Value "%s" is email "%s".' . PHP_EOL, $emailValue, $result);
