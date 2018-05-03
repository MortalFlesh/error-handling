<?php declare(strict_types=1);

namespace MF\ErrorHandling\Email\Facade;

use MF\ErrorHandling\Email\Entity\Email;
use MF\ErrorHandling\Email\Service\Factory;
use MF\ErrorHandling\Email\Service\Validator;

class EmailFacade
{
    /** @var Factory */
    private $factory;

    public function __construct()
    {
        $this->factory = new Factory(new Validator());
    }

    public function createEmail(string $emailValue, callable $failure): ?Email
    {
        return $this->factory->createEmail($emailValue, $failure);
    }
}
