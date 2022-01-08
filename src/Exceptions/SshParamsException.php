<?php

namespace DefStudio\Ssh\Exceptions;

use Exception;

class SshParamsException extends Exception
{
    public static function param_missing(string $param): SshParamsException
    {
        return new SshParamsException("$param missing");
    }

    public static function could_not_connect(): SshParamsException
    {
        return new SshParamsException('unable to establish a connection');
    }

    public static function login_failed(): SshParamsException
    {
        return new SshParamsException('bad credentials');
    }


}
