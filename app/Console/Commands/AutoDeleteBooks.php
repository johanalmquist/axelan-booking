<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutoDeleteBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'axelan:autodeletebooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all books that are not confirmed after the confirmation time';

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
        new \App\Http\Controllers\Admin\autoDeleteBooks();
    }
}
