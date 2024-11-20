<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreatePlayer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:player';

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
        $name = $this->ask('What is the player name?');
        $email = $this->ask('What is the player email?');

        $player = new \App\Models\Player();
        $player->name = $name;
        $player->email = $email;
        $player->save();

        $player->notify(new \App\Notifications\TicketEmailNotification());

        $this->info('Player created successfully!');
    }
}
