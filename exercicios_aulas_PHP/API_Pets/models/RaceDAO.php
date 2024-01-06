<?php

class RaceDAO
{
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO("pgsql:host=localhost;dbname=api_pets", "docker", "docker");
    }

    public function insert(Race $race)
    {
        try {

            $sql = "insert into races (name) values (:name_value)";

            $statement = ($this->getConnection())->prepare($sql);
            $statement->bindValue(":name_value", $race->getName());

            $statement->execute();

            return ['success' => true];
        } catch (PDOException $error) {
            debug($error->getMessage());
            return ['success' => false];
        }
    }


    public function findMany()
    {
        $sql = "SELECT id,name from races";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
