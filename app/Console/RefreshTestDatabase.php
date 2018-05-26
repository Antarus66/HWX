<?php

namespace App\Console;

use Illuminate\Console\Command;

class RefreshTestDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testdb:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh test database from already migrated';

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
        $command = "cp -f " . database_path('migrated.sqlite')
            . " "
            . database_path("testing.sqlite");
        exec($command);
        $this->info("Test database refreshed.");
    }
}
