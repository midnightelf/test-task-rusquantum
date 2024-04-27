<?php

namespace Src\Agenda\Ticket\Domain\Model\ValueObjects;

use Src\Common\Domain\ValueObject;

class Message extends ValueObject
{
    public function __construct(
        private readonly string $message,
    ) {
        // assertIsValid...
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function __toString(): string
    {
        return $this->getMessage();
    }

    public function jsonSerialize(): string
    {
        return $this->getMessage();
    }
}
