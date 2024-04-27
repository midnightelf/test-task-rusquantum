<?php

namespace Src\Agenda\Ticket\Application\Factories;

use Src\Agenda\Ticket\Domain\Repositories\TicketRepositoryInterface;
use Src\Agenda\Ticket\Application\Exceptions\InvalidStorageTypeException;
use Src\Agenda\Ticket\Infrastructure\Enums\StorageType;
use Src\Agenda\Ticket\Infrastructure\Repositories\Ticket\FileTicketRepository;
use Src\Agenda\Ticket\Infrastructure\Repositories\Ticket\MysqlTicketRepository;

class TicketRepositoryFactory
{
    public static function make(string $storageType): TicketRepositoryInterface
    {
        return match ($storageType) {
            StorageType::MYSQL => app(MysqlTicketRepository::class),
            StorageType::FILE => app(FileTicketRepository::class),
            default => throw new InvalidStorageTypeException,
        };
    }
}
