<?php

namespace Src\Agenda\Ticket\Application\UseCases\Commands;

use Src\Agenda\Ticket\Application\Factories\TicketRepositoryFactory;
use Src\Agenda\Ticket\Domain\Model\Ticket;
use Src\Agenda\Ticket\Domain\Repositories\TicketRepositoryInterface;
use Src\Common\Domain\CommandInterface;

class AddNewTicket implements CommandInterface
{
    private TicketRepositoryInterface $repository;

    public function __construct(
        private readonly Ticket $ticket,
        private readonly string $connection,
    ) {
        $this->repository = TicketRepositoryFactory::make($connection);
    }

    public function execute(): mixed
    {
        return $this->repository->add($this->ticket);
    }
}
