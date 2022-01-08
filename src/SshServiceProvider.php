<?php

namespace DefStudio\Ssh;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use DefStudio\Ssh\Commands\SshCommand;

class SshServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('ssh-client');
    }
}
