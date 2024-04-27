<?php

namespace Src\Agenda\Ticket\Application\Exceptions;

class InvalidStorageTypeException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Invalid or unknown storage type');
    }
}
