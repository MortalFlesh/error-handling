<?php declare(strict_types=1);

namespace MF\ErrorHandling\Email\Service;

use MF\ErrorHandling\Email\Entity\Email;

class Factory
{
    /** @var Validator */
    private $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function createEmail(string $emailValue, callable $failure): ?Email
    {
        return $this->validator->isValidEmail($emailValue)
            ? new Email($emailValue)
            : $failure($emailValue);
    }
}
