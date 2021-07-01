<?php

namespace TenderSrl\Version;

use PragmaRX\Version\Package\Console\Commands\Absorb;
use PragmaRX\Version\Package\Console\Commands\Commit;
use PragmaRX\Version\Package\Console\Commands\Show;
use PragmaRX\Version\Package\Console\Commands\Timestamp;
use PragmaRX\Version\Package\Console\Commands\Version as VersionCommand;
use PragmaRX\Version\Package\ServiceProvider;
use TenderSrl\Version\Console\Commands\Major;
use TenderSrl\Version\Console\Commands\Minor;
use TenderSrl\Version\Console\Commands\Patch;
use TenderSrl\Version\Console\Commands\UpdateHeadCommit;

class VersionServiceProvider extends ServiceProvider
{
    /**
     * Console commands to be instantiated.
     *
     * @var array
     */
    protected $commandList = [
        'pragmarx.version.command' => VersionCommand::class,

        'pragmarx.version.commit.command' => Commit::class,

        'pragmarx.version.show.command' => Show::class,

        'tendersrl.version.major.command' => Major::class,

        'tendersrl.version.minor.command' => Minor::class,

        'tendersrl.version.patch.command' => Patch::class,

        'pragmarx.version.absorb.command' => Absorb::class,

        'pragmarx.version.absorb.timestamp' => Timestamp::class,

        'tendersrl.version.update_head.command' => UpdateHeadCommit::class,
    ];

    /**
     * Get the original config file.
     *
     * @return string
     */
    protected function getConfigFileStub(): string
    {
        return __DIR__.'/../config/version.yml';
    }

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
