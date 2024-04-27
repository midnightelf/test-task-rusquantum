<?php

namespace Src\Agenda\Ticket\Presentation\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Agenda\Ticket\Application\Mappers\TicketMapper;
use Src\Agenda\Ticket\Application\UseCases\Commands\AddNewTicket;
use Src\Agenda\Ticket\Application\UseCases\Queries\GetAllTickets;

class TicketController
{
    public function store(Request $request): JsonResponse
    {
        $storeConnection = $request->string('connection');
        $newTicket = TicketMapper::fromRequest($request);

        $ticket = (new AddNewTicket($newTicket, $storeConnection))->execute();

        return response()->json($ticket);
    }

    public function index(Request $request): JsonResponse
    {
        $storeConnection = $request->string('connection');

        return response()->json((new GetAllTickets($storeConnection))->handle());
    }
}
