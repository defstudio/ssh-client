<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace DefStudio\Ssh;

use DefStudio\Ssh\Exceptions\SshParamsException;
use phpseclib\Crypt\RSA;
use phpseclib\Net\SSH2;

class Ssh
{
    private string|null $key;
    private string|null $password;
    private string $host;
    private int $port = 22;
    private string $username;
    private SSH2 $client;

    public function key(string|null $key): Ssh
    {
        $this->key = $key;

        return $this;
    }

    public function password(string|null $password): Ssh
    {
        $this->password = $password;

        return $this;
    }

    public function host(string $host): Ssh
    {
        $this->host = $host;

        return $this;
    }

    public function port(int $port): Ssh
    {
        $this->port = $port;

        return $this;
    }

    public function username(string $username): Ssh
    {
        $this->username = $username;

        return $this;
    }

    public function connect(): Ssh
    {
        $this->checkRequirements();

        if (! empty($this->key)) {
            $key = new RSA();
            $key->loadKey($this->key);
        } else {
            $key = $this->password;
        }

        $this->client = new SSH2($this->host, $this->port);

        if (! $this->client->login($this->username, $key)) {
            if (! $this->client->isConnected()) {
                throw SshParamsException::could_not_connect();
            }

            throw SshParamsException::login_failed();
        }

        return $this;
    }

    public function execute(string|array $commands): string|null
    {
        if (empty($this->client)) {
            $this->connect();
        }

        if (is_string($commands)) {
            $commands = explode("\n", $commands);
        }

        $result = $this->client->exec(implode(" && ", $commands));

        if (! $result) {
            return null;
        }

        return $result;
    }

    protected function checkRequirements(): void
    {
        $this->host || throw SshParamsException::param_missing('host');
        $this->port || throw SshParamsException::param_missing('port');
        $this->username || throw SshParamsException::param_missing('username');
        $this->key || $this->password || throw SshParamsException::param_missing('key and/or password');
    }
}
