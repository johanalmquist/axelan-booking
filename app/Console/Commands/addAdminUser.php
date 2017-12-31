<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\AddAdminUserController;
use Illuminate\Console\Command;

class addAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'axelan:addAdminUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this for add the first admin user';

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
        $info = array(
            'name' => '',
            'email' => '',
            'password' => '',
            'nick' => '',
            'born' => ''
        );
        $this->info('This will create the first user for admin access. You only need to do this once. Later you can add more admins from the admin panel.');
        if ($this->confirm('Do you wish to continue?')) {
            $info['name'] = $this->ask('Enter your name');
            $info['nick'] = $this->ask('Enter your nick');
            $info['born'] = $this->ask('Enter your birthday (YYYY-MM-DD)');
            $info['email'] = $this->ask('Enter your email');
            $info['password'] = $this->ask('Enter your password');

            $this->info('This will be saved:');
            $this->line('Name: ' . $info['name']);
            $this->line('Nick: ' . $info['nick']);
            $this->line('Born: ' . $info['born']);
            $this->line('Email: ' . $info['email']);
            $this->line('Password: ' . $info['password']);
            if ($this->confirm('Do you wish to continue')) {
                if (new AddAdminUserController($info)) {
                    // saved
                    $this->info('Your infomation are now saved. You can login with your email and password ( '. $info['email'] . ' '.$info['password']. ' )');
                } else {
                    // error
                    $this->error('Something went wrong, please try agin.');
                }
            } else {
                $this->info('Bye!');
            }
        } else {
            $this->info('Bye, have a great day!');
        }


    }
}
