<?php

namespace DefStudio\Ssh\Facades;

use DefStudio\Ssh\Support\Testing\Fakes\Ssh as SshFake;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void assertExecuted(string)
 * @method static void assertNothingExecuted()
 *
 * @see \DefStudio\Ssh\Ssh
 */
class Ssh extends Facade
{
    /**
     * @param array<string, (callable(string):string)|string> $replies
     */
    public static function fake($replies = []): SshFake
    {
        static::swap($fake = new SshFake());
        return $fake;
    }

    protected static function getFacadeAccessor()
    {
        return 'ssh-client';
    }
}
