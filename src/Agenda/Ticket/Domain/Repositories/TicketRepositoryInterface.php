<?php

namespace Src\Agenda\Ticket\Domain\Repositories;

use Src\Agenda\Ticket\Domain\Model\Ticket;

interface TicketRepositoryInterface
{
    public function add(Ticket $ticket): Ticket;

    public function all(): array;
}
