<?php

namespace Src\Agenda\Ticket\Domain\Model;

use Src\Agenda\Ticket\Domain\Model\ValueObjects\Id;
use Src\Agenda\Ticket\Domain\Model\ValueObjects\Message;
use Src\Agenda\Ticket\Domain\Model\ValueObjects\Phone;
use Src\Agenda\Ticket\Domain\Model\ValueObjects\Username;
use Src\Common\Domain\AggregateRoot;

class Ticket extends AggregateRoot
{
    public function __construct(
        public readonly ?Id $id,
        public readonly Username $username,
        public readonly Phone $phone,
        public readonly Message $message,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id'       => $this->id,
            'username' => $this->username,
            'phone'    => $this->phone,
            'message'  => $this->message,
        ];
    }
}
