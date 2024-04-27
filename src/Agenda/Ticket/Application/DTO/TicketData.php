<?php

namespace Src\Agenda\Ticket\Application\DTO;

use Src\Agenda\Ticket\Domain\Model\ValueObjects\Message;
use Src\Agenda\Ticket\Domain\Model\ValueObjects\Phone;
use Src\Agenda\Ticket\Domain\Model\ValueObjects\Username;

class TicketData
{
    public function __construct(
        public readonly ?int $id,
        public readonly Username $username,
        public readonly Phone $phone,
        public readonly Message $message,
    ) {
    }

    public static function fromArray(array $ticket): static
    {
        return new static(
            id: $ticket['id'] ?? null,
            username: $ticket['username'],
            phone: $ticket['phone'],
            message: $ticket['message'],
        );
    }
}
