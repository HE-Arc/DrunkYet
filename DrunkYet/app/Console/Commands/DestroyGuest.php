<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Carbon\Carbon;

class DestroyGuest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'destroy:guest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'destroy the guests accounts';

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
        User::where('name','invité')->where('created_at','<=',Carbon::now()->subDay()->toDateTimeString())->delete();
        $this->info('guests destroyed succefully !');
    }
}
