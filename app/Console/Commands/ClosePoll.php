<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClosePoll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'close:poll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete poll after year';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('polls')
        ->WhereYear('created_at', date('Y')-1)
        ->WhereMonth('created_at', date('m'))
        ->WhereDay('created_at', date('d'))
        ->delete();
    }
}
