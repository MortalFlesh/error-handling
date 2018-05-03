<?php declare(strict_types=1);

namespace MF\ErrorHandling\Email\Service;

class Validator
{
    private const PATTERN = '/^\S+@\S+\.\S+$/';

    public function isValidEmail(string $emailValue): bool
    {
        return preg_match(self::PATTERN, $emailValue) === 1;
    }
}
