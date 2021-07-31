<?php

declare(strict_types=1);

namespace App\Shared\Database;

final class DbCredentials
{
    private string $connection;

    private string $username;

    private string $password;

    private string $characterSet;

    private int $clientId;

    public static function fromArray(array $array): self
    {
        return new self(
            (string) ($array['sodb']['connection'] ?? 'connection not defined in config'),
            (string) ($array['sodb']['username'] ?? 'username not defined in config'),
            (string) ($array['sodb']['password'] ?? 'password not defined in config'),
            (string) ($array['sodb']['characterset'] ?? 'characterset not defined in config'),
            (int) ($array['sodb']['clientId'] ?? 'clientId not defined in config')
        );
    }

    public static function empty(): self
    {
        return new self('', '', '', '', 0);
    }

    private function __construct(
        string $connection,
        string $username,
        string $password,
        string $characterSet,
        int    $clientId = 1
    ) {
        $this->connection = $connection;
        $this->username = $username;
        $this->password = $password;
        $this->characterSet = $characterSet;
        $this->clientId = $clientId;
    }

    public function characterSet(): string
    {
        return $this->characterSet;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function connection(): string
    {
        return $this->connection;
    }

    public function clientId(): int
    {
        return $this->clientId;
    }
}
