<?php

namespace Src\Agenda\Ticket\Domain\Model\ValueObjects;

use Src\Agenda\Ticket\Domain\Exceptions\InvalidPhoneException;
use Src\Common\Domain\ValueObject;

class Phone extends ValueObject
{
    public function __construct(
        private readonly string $phone,
    ) {
        $this->assetIsValid($phone);
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    // public function formatted(): string;

    public function __toString(): string
    {
        return $this->getPhone();
    }
    
    public function jsonSerialize(): string
    {
        return $this->getPhone();
    }

    protected function assetIsValid(string $number): void
    {
        if (!preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $number)) {
            throw new InvalidPhoneException;
        }
    }
}
