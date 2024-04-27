<?php

namespace Src\Agenda\Ticket\Infrastructure\Repositories\Ticket;

use Illuminate\Filesystem\Filesystem;
use Src\Agenda\Ticket\Application\Mappers\TicketMapper;
use Src\Agenda\Ticket\Domain\Model\Ticket;
use Src\Agenda\Ticket\Domain\Repositories\TicketRepositoryInterface;
use Src\Agenda\Ticket\Infrastructure\EloquentModels\TicketEloquentModel;

class FileTicketRepository implements TicketRepositoryInterface
{
    public function __construct(
        protected string $ticketsFilePath,
        protected string $lastIdFilePath,
    ) {
    }

    public function add(Ticket $ticket): Ticket
    {
        $ticketData = $ticket->toArray();
        $lastId = $this->getLastIdFromFile();

        $ticketData['id'] = $newId = ++$lastId;

        $existingTickets = [];
        if (file_exists($this->ticketsFilePath)) {
            $existingTickets = json_decode(file_get_contents($this->ticketsFilePath), true);
        }

        $existingTickets[] = $ticketData;

        file_put_contents($this->ticketsFilePath, json_encode($existingTickets, JSON_PRETTY_PRINT));

        file_put_contents($this->lastIdFilePath, (string) $newId);

        return TicketMapper::fromArray($ticketData);
    }

    protected function getLastIdFromFile(): int
    {
        return (int) file_get_contents($this->lastIdFilePath);
    }

    public function all(): array
    {
        if (!file_exists($this->ticketsFilePath)) {
            return [];
        }

        $ticketsJson = file_get_contents($this->ticketsFilePath);

        $ticketsArray = json_decode($ticketsJson, true);

        return $ticketsArray ?: [];
    }
}
