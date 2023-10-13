<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\DetailTest;

class RegStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regstatus:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Registration Status of Participants';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        DetailTest::where('due_date','<=', $now)->update(['reg_status' =>false]);

        $this->info('Registration Status Update Successfully.');
        
        //return Command::SUCCESS;
    }
}
