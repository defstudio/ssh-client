<?php

namespace DefStudio\Ssh\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DefStudio\Ssh\Ssh
 */
class Ssh extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ssh-client';
    }
}
