<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// input
[$_, $emailValue] = $argv;

// application
$emailFactory = new \MF\ErrorHandling\Email\Service\Factory();
$email = $emailFactory->createEmail($emailValue);

$result = $email
    ? $email->getValue()
    : 'Invalid';

// output
echo sprintf('Value "%s" is email "%s".' . PHP_EOL, $emailValue, $result);
