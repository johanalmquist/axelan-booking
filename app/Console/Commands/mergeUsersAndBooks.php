<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\MergeController;
use Illuminate\Console\Command;

class mergeUsersAndBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'axelan:merge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merge users and books from oldsystem to new system';

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
        $merge = new MergeController();
        $rows = $merge->index();
        $bar = $this->output->createProgressBar(count($rows));
        $i = 0;
        $this->info('Will start to merge new users and books in 5 secounds');
        sleep(5);
        foreach ($rows as $row){
            $this->info(' Mering user '.$row['user']['name'].' and book '. $row['book']['nr']);
            $bar->advance();
            $merge->run($row['user'], $row['book']);
            $this->output->block('User '.$row['user']['name'].' and book '.$row['book']['nr'].' is merge and user have got a email');
            $i++;
        }
        $this->output->block($i.' users and books have been merge');
    }
}
