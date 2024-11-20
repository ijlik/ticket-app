<?php

namespace App\Console\Commands;

use App\Jobs\SendTicketEmail;
use Illuminate\Console\Command;

class CreateTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ticket {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        dispatch(new SendTicketEmail($email));
    }
}
