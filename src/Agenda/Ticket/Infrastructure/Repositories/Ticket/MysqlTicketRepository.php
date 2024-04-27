<?php

namespace Src\Agenda\Ticket\Infrastructure\Repositories\Ticket;

use Src\Agenda\Ticket\Application\Mappers\TicketMapper;
use Src\Agenda\Ticket\Domain\Model\Ticket;
use Src\Agenda\Ticket\Domain\Repositories\TicketRepositoryInterface;
use Src\Agenda\Ticket\Infrastructure\EloquentModels\TicketEloquentModel;

class MysqlTicketRepository implements TicketRepositoryInterface
{
    public function add(Ticket $ticket): Ticket
    {
        $eloquentModel = TicketEloquentModel::create($ticket->toArray());

        $eloquentModel->save();

        return TicketMapper::fromEloquent($eloquentModel->fresh());
    }

    public function all(): array
    {
        return TicketEloquentModel::all()->toArray();
    }
}
