<?php

namespace DefStudio\Ssh;

use phpseclib\Crypt\RSA;
use phpseclib\Net\SSH2;

class Ssh
{
    private string $key;
    private string $password;
    private string $host;
    private string $port;
    private string $username;
    private SSH2 $client;

    public function key(string $key): Ssh
    {
        $this->key = $key;

        return $this;
    }

    public function password(string $password): Ssh
    {
        $this->password = $password;

        return $this;
    }

    public function host(string $host): Ssh
    {
        $this->host = $host;

        return $this;
    }

    public function set_port(string $port): Ssh
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
        $this->check_requirements();

        if (! empty($this->key)) {
            $key = new RSA();
            $key->loadKey($this->key);
        } else {
            $key = $this->password;
        }

        $this->client = new SSH2($this->host, $this->port);
        $this->client->login($this->username, $key);
        //TODO handle failed logins

        return $this;
    }

    private function check_requirements(): void
    {
        //TODO
    }
}
