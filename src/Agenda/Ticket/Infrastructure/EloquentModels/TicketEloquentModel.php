<?php

namespace Src\Agenda\Ticket\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Model;

class TicketEloquentModel extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'username',
        'phone',
        'message',
    ];

    protected $rules = [
        'username' => 'string|required',
        'phone'    => 'string|required',
        'message'  => 'string|required',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
