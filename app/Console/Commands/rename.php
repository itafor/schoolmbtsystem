<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class rename extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'francis:rename {from : Name of table you want to rename} {to : name of new table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'rename table';

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
        $from = $this->argument('from');
        $to = $this->argument('to');

        DB::statement('ALTER TABLE $from RENAME TO $to');
        $this->info("Table $from is now renamed $to successfully");
    }
}
