<?php

namespace BlackPanda\Ticket;

use Illuminate\Support\ServiceProvider;

class TicketServiceProvider extends ServiceProvider
{
    /**
     * determine boot method for register Services on Booting
     */
    public function boot()
    {
        /**
         * register publishes
         */

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'laravel-ticket-migrations');

        $this->publishes([
            __DIR__.'/../config/ticket.php' => config_path('ticket.php'),
        ],'laravel-ticket-config');

        /**
         * load migrations
         */
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');
    }

    /**
     * Register method of service provider for set Migration etc.
     */
    public function register()
    {

    }

}
