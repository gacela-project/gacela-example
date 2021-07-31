<?php

declare(strict_types=1);

namespace App\Shared\Database;

use RuntimeException;

final class OracleConnection implements DbConnectionInterface
{
    /** @var resource */
    private $connection;

    public static function connect(DbCredentials $credentials): self
    {
        if (!function_exists('oci_connect')) {
            throw new RuntimeException('Function oci_connect not found');
        }
        $connection = oci_connect(
            $credentials->username(),
            $credentials->password(),
            $credentials->connection(),
            $credentials->characterSet()
        );

        if (false === $connection) {
            throw new RuntimeException('No connection possible');
        }

        return new self($connection);
    }

    /**
     * @param resource $connection
     */
    private function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function query(string $query): array
    {
        $query = trim(preg_replace('/\s\s+/', ' ', $query));
        $sql = oci_parse($this->connection, $query);
        oci_execute($sql);

        $result = [];
        /** @psalm-suppress UndefinedConstant,NullArgument */
        $nrows = oci_fetch_all($sql, $result, 0, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

        return $result;
    }
}
