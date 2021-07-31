<?php

declare(strict_types=1);

namespace App\Shared\Database;

use PDO;
use PDOException;
use PDOStatement;
use RuntimeException;

final class MySqlConnection implements DbConnectionInterface
{
    private PDO $connection;

    public static function connect(DbCredentials $credentials): self
    {
        try {
            $conn = new PDO(
                $credentials->connection(),
                $credentials->username(),
                $credentials->password()
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new RuntimeException('Connection failed: ' . $e->getMessage());
        }

        return new self($conn);
    }

    private function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function query(string $query): array
    {
        /** @var PDOStatement $smt */
        $smt = $this->connection->query($query);

        return $smt->fetchAll();
    }
}
