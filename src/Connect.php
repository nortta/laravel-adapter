<?php

namespace Nortta\Laravel;

use Illuminate\Console\Command;

class Connect extends Command
{
    protected $signature = 'nortta:connect {token}';

    public function handle(Nortta $nortta)
    {
        $this->warn("Generating key...");

        $key = $nortta->generateKey();

        $this->warn("Connecting to Nortta...");

        $response = $nortta->connect($key, $this->argument('token'));

        if ($response->ok()) {
            $this->info("Connected.");
            return Command::SUCCESS;
        }

        $this->error("Could not connect to Nortta. Response: ");

        $this->error($response->body());

        return Command::FAILURE;
    }
}
