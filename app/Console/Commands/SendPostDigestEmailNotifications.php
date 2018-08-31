<?php

namespace Opencycle\Console\Commands;

use Illuminate\Console\Command;

class SendPostDigestEmailNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'opencycle:digests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email digest notifications to subscribed users';

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
        //
    }
}
