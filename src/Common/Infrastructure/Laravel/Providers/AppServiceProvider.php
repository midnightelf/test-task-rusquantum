<?php

namespace Src\Common\Infrastructure\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Agenda\Ticket\Domain\Repositories\TicketRepositoryInterface;
use Src\Agenda\Ticket\Infrastructure\Repositories\Ticket\FileTicketRepository;
use Src\Agenda\Ticket\Infrastructure\Repositories\Ticket\MysqlTicketRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TicketRepositoryInterface::class, MysqlTicketRepository::class);
        $this->app->bind(FileTicketRepository::class, function () {
            return new FileTicketRepository(
                base_path('storage/app/tickets.json'),
                base_path('storage/app/tickets_serial_sequence.txt'),
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
