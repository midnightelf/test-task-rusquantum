<?php

namespace Src\Agenda\Ticket\Domain\Model\ValueObjects;

use Src\Common\Domain\ValueObject;

class Id extends ValueObject
{
    public function __construct(
        private int $id,
    ) {
        // assertIsValid...
    }

    public function getId(): int
    {
        return $this->id;
    }
    
    public function __toString(): string
    {
        return (string) $this->getId();
    }

    public function jsonSerialize(): int
    {
        return $this->getId();
    }
}
