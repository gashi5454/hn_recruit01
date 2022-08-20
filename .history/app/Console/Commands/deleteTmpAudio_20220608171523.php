<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class deleteTmpAudio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'display:hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '"HelloWorld"を表示します。';

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
        dump('HelloWorld!!!');
        return Command::SUCCESS;
    }
}
