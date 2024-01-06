<?php

class PetDAO
{
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO("pgsql:host=localhost;dbname=api_pets", "docker", "docker");
    }

    public function insert(Pet $pet)
    {
        try {
            $sql = "insert into pets 
            (
                name,
                race_id,
                age,
                size,
                weight
            )
            values
            (
                :name_value, 
                :race_id_value,
                :age_value,
                :size_value,
                :weight_value
            )
            ";

            $statement = ($this->getConnection())->prepare($sql);

            $statement->bindValue(":name_value", $pet->getName());
            $statement->bindValue(":race_id_value", $pet->getRaceId());
            $statement->bindValue(":age_value", $pet->getAge());
            $statement->bindValue(":size_value", $pet->getSize());
            $statement->bindValue(":weight_value", $pet->getWeight());

            $statement->execute();

            return ['success' => true];
        } catch (PDOException $error) {
            debug($error->getMessage());
            return ['success' => false];
        }
    }


    public function findMany()
    {
        $sql = "select
                    pets.id,
                    pets.name,
                    size,
                    races.name as nome_raca
                        from pets
                            join races on pets.race_id = races.id
                            order by name ASC         
        ";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOne($id)
    {
        $sql = "SELECT * from pets where id = :id_value";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->bindValue(":id_value", $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteOne($id)
    {
        try {
            $sql = "delete from pets where id = :id_value";

            $statement = ($this->getConnection())->prepare($sql);
            $statement->bindValue(":id_value", $id);
            $statement->execute();

            return ['success' => true];
        } catch (PDOException $error) {
            debug($error->getMessage());
            return ['success' => false];
        }
    }

    public function updateOne($id, $data)
    {
        $petInDatabase = $this->findOne($id);

        $sql = "update pets 
                        set 
                        name=:name_value,
                        race_id=:race_id_value,
                        size=:size_value,
                        weight=:weight_value,
                        age=:age_value
                where id = :id_value
            ";

        $statement = ($this->getConnection())->prepare($sql);

        $statement->bindValue(":id_value", $id);

        $statement->bindValue(
            ":name_value",
            isset($data->name) ?
                $data->name :
                $petInDatabase['name']
        );

        $statement->bindValue(
            ":race_id_value",
            isset($data->race_id) ?
                $data->race_id :
                $petInDatabase['race_id']
        );

        $statement->bindValue(
            ":size_value",
            isset($data->size) ?
                $data->size :
                $petInDatabase['size']
        );

        $statement->bindValue(
            ":weight_value",
            isset($data->weight)
                ? $data->weight :
                $petInDatabase['weight']
        );

        $statement->bindValue(
            ":age_value",
            isset($data->age) ?
                $data->age :
                $petInDatabase['age']
        );

        $statement->execute();

        return ['success' => true];
    }

    public function dashboard(){
        $sql = "select size, count(size) from pets
        group by size
        order by count(size) DESC";

        $statement = ($this->getConnection())->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
