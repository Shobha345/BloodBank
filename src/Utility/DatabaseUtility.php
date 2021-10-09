<?php
namespace App\Utility;

class DatabaseUtility extends Singleton {
    protected static ?\PDO $connection = null;

    public static function getInstance(): DatabaseUtility {
        return parent::getInstance();
    }

    public function connect(string $type = 'mysql', string $host = '', string $username = '', string $password = '', string $database = '', int $port = 3306) {
        if (!self::$connection instanceof \PDO) {
            try {
                self::$connection = @new \PDO($type . ':host=' . $host . ';port=' . $port . ';dbname=' . $database, $username, $password);
            } catch (\PDOException $exception) {
                exit('<b>Database connection failed:</b> ' . $exception->getMessage() . ' (' . $exception->getCode() . ')');
            }
        }
    }

    protected function isConnected() {
        if (!self::$connection instanceof \PDO) {
            exit('<b>Error:</b> Database not connected!');
        }
    }

    public function getConnection(): ?\PDO {
        $this->isConnected();
        return self::$connection;
    }

    /**
     * $rows = $this->queryObjects('SELECT id, username FROM user WHERE id = 1');
     */
    public function queryObjects(string $statement, string $class = \stdClass::class): array {
        $this->isConnected();

        try {
            $statement = self::$connection->query($statement);
            return $statement->fetchAll(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $exception) {
            exit('<b>Database query failed:</b> ' . $exception->getMessage() . ' (' . $exception->getCode() . ')');
        }
    }

    /**
     * $rows = $this->prepareObjects('SELECT id, username FROM user WHERE id = :id', [':id' => 1]);
     */
    public function prepareObjects(string $statement, array $params = [], string $class = \stdClass::class): array {
        $this->isConnected();

        try {
            $statement = self::$connection->prepare($statement);
            $statement->execute($params);
            return $statement->fetchAll(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $exception) {
            exit('<b>Database query failed:</b> ' . $exception->getMessage() . ' (' . $exception->getCode() . ')');
        }
    }
}
