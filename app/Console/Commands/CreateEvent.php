<?php

namespace App\Console\Commands;

use App\Jobs\CreateEventJob;
use Illuminate\Console\Command;

class CreateEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:event';

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
        dispatch(new CreateEventJob());
    }
}
