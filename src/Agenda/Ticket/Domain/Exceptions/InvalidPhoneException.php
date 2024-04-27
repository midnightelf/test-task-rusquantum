<?php

namespace Src\Agenda\Ticket\Domain\Exceptions;

class InvalidPhoneException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Invalid phone number');
    }
}
