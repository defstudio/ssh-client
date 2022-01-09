<?php

namespace DefStudio\Ssh;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SshServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('ssh-client');

        $this->app->bind('ssh-client', fn () => new Ssh());
    }
}
