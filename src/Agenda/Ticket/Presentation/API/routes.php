<?php

use Illuminate\Support\Facades\Route;
use Src\Agenda\Ticket\Presentation\API\TicketController;

Route::resource('ticket', TicketController::class)->only('store', 'index');
