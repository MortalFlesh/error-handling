<?php declare(strict_types=1);

namespace MF\ErrorHandling\Email\Service;

use MF\ErrorHandling\Email\Entity\Email;

class Factory
{
    public function createEmail(string $emailValue): ?Email
    {
        $validator = new Validator();

        return $validator->isValidEmail($emailValue)
            ? new Email($emailValue)
            : null;
    }
}
