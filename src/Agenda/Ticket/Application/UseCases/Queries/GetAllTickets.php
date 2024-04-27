<?php

namespace Src\Agenda\Ticket\Application\UseCases\Queries;

use Src\Agenda\Ticket\Application\Factories\TicketRepositoryFactory;
use Src\Agenda\Ticket\Domain\Repositories\TicketRepositoryInterface;
use Src\Common\Domain\QueryInterface;

class GetAllTickets implements QueryInterface
{
    private TicketRepositoryInterface $repository;

    public function __construct(
        private readonly string $connection
    ) {
        $this->repository = TicketRepositoryFactory::make($connection);
    }

    public function handle(): array
    {
        return $this->repository->all();
    }
}
