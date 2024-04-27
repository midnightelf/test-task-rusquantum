<?php

namespace Src\Agenda\Ticket\Domain\Model\ValueObjects;

use Src\Common\Domain\ValueObject;

class Username extends ValueObject
{
    public function __construct(
        private readonly string $username,
    ) {
        // assertIsValid...
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function __toString(): string
    {
        return $this->getUsername();
    }

    public function jsonSerialize(): string
    {
        return $this->getUsername();
    }
}
