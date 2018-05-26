<?php

namespace App\Console;

use Illuminate\Console\Command;

class ReseedTestDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testdb:reseed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes an old test databases and creates a new ones.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $command = "rm " . database_path('migrated.sqlite') . ";"
            . "rm " . database_path('testing.sqlite') . ";"
            . "touch " . database_path('migrated.sqlite') . "&&"
            . "php artisan migrate --database=migrated --seed";
        $this->info("Start seeding test database.");
        exec($command);

        $this->call('migrate', [
            '--database' => 'migrated',
            '--seed' => true
        ]);
        $this->info("Test database reseeded.");
    }
}
