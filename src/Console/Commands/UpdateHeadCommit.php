<?php

namespace TenderSrl\Version\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

class UpdateHeadCommit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'version:update-head-commit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increment app revision and commit in version configuration';

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
     * @return void
     */
    public function handle()
    {
        $revision = exec('git rev-parse --verify HEAD');
        $commit = Str::limit($revision, 8, '');
        $config = config('version');
        $config['current']['commit'] = $commit;
        $config['current']['revision'] = $revision;
        $yaml = Yaml::dump($config);
        file_put_contents(config_path('version.yml'), $yaml);
    }
}
