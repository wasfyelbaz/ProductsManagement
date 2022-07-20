<?php
namespace elbaz\Database\Managers;
use elbaz\Database\Managers\Contracts\DatabaseManager;

class MySQLManager implements DatabaseManager
{
    protected static $instance;

    public function connect(): \PDO
    {
        if (!self::$instance)
        {
            self::$instance = new \PDO(env('DB_DRIVER').":host=".env('DB_HOST').";dbname=".env('DB_DATABASE'), env('DB_USERNAME'), env('DB_PASSWORD'));
        }

        return self::$instance;
    }
    public function query(string $query, $values=[])
    {
        $stmt = self::$instance->prepare($query);
        for ($i = 1; $i < count($values); $i++)
        {
            $stmt->bindValue($i, $values[$i-1]);
        }

        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function create($data)
    {

    }
    public function read($columns = "*", $filter = null)
    {

    }
    public function update($id, $data)
    {

    }
    public function delete($id)
    {

    }


}