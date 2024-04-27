<?php

namespace Src\Agenda\Ticket\Application\Mappers;

use Illuminate\Http\Request;
use Src\Agenda\Ticket\Domain\Model\Ticket;
use Src\Agenda\Ticket\Domain\Model\ValueObjects\Id;
use Src\Agenda\Ticket\Domain\Model\ValueObjects\Message;
use Src\Agenda\Ticket\Domain\Model\ValueObjects\Phone;
use Src\Agenda\Ticket\Domain\Model\ValueObjects\Username;
use Src\Agenda\Ticket\Infrastructure\EloquentModels\TicketEloquentModel;

class TicketMapper
{
    public static function fromRequest(Request $request): Ticket
    {
        return new Ticket(
            id:       new Id($request->integer('id')),
            username: new Username($request->string('username')),
            phone:    new Phone($request->string('phone')),
            message:  new Message($request->string('message')),
        );
    }

    public static function fromEloquent(TicketEloquentModel $model): Ticket
    {
        return new Ticket(
            id:       new Id($model->id),
            username: new Username($model->username),
            phone:    new Phone($model->phone),
            message:  new Message($model->message),
        );
    }

    public static function fromArray(array $array): Ticket
    {
        return new Ticket(
            id:       new Id($array['id']),
            username: new Username($array['username']),
            phone:    new Phone($array['phone']),
            message:  new Message($array['message']),
        );
    }
}
