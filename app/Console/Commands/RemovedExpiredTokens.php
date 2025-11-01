<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Sanctum\PersonalAccessToken;

class RemovedExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:remove_all  {--days=30 : the Number of days to retain expired tokens}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all expired tokens';

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
     * @return int
     */
    public function handle()
    {
        $expiration = config('sanctum.expiration');
        if($expiration){
            $token = PersonalAccessToken::where('created_at','<',  now()->subMinute($expiration + (7 * 24 *60)));
            $token->delete();
            $this->info('All the expired tokens have been deleted');
            return 0;
        }

        $this->warn('Expire time is not set');
    }
}
