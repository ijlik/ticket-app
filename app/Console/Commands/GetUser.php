<?php

namespace App\Console\Commands;

use App\Jobs\SendTicketEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GetUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-user';

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
        $users = Cache::remember('users', 60, function () {
            $users = User::orderBy('name', 'DESC')->take(50)->get();
            $data = [];

            foreach ($users as $user) {
                $data[] = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                ];
            }

            return $data;
        });

        foreach ($users as $user) {
            $this->info($user['name']);
        }
    }
}
