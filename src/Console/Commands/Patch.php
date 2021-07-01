<?php

namespace TenderSrl\Version\Console\Commands;

class Patch extends \PragmaRX\Version\Package\Console\Commands\Patch
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'version:patch {--no-commit} {--no-tag} {--tag-format=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increment app patch version';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if(!$this->option('no-commit')) {
            $commitMessage = $this->ask('Enter your commit message');

            parent::handle();

            exec('git commit --all -m "' . $commitMessage . '"');

            $this->call('version:update-head-commit');
        }
        else parent::handle();

        if(!$this->option('no-tag')) {
            $tagFormat = $this->option('tag-format') ?? config('version.tag-format', 'tag');

            if(empty(config('version.format.' . $tagFormat))) {
                $this->warn('Incorrect tag format. Cannot find format "' . $tagFormat . '" in ' . config_path('version.yml'));
                return;
            }

            exec('git tag ' . (app('pragmarx.version'))->format($tagFormat));
        }
    }
}
