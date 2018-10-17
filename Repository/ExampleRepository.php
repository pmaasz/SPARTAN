<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:15
 */

require_once __DIR__ . "/../Services/Database.php";

class ExampleRepository
{
    public function findAll()
    {
        $result = Database::getInstance()->query("SELECT * FROM table")[0];

        return $result;
    }

    public function findById($id)
    {
        $result = Database::getInstance()->query("SELECT * FROM table WHERE id = :id", array(
                'id' => $id,
            )
        )[0];

        return $result;
    }

    public function insert($parameter)
    {
        return Database::getInstance()->insert("INSERT INTO table SET parameter = :parameter", array(
                'parameter' => $parameter,
            )
        );
    }

    public function update($parameter)
    {
        return Database::getInstance()->insert(
            "UPDATE table SET parameter = :parameter", array(
                'parameter' => $parameter,
            )
        );

    }

    public function delete($id)
    {
       return Database::getInstance()->query('DELETE FROM table WHERE id = :id', [
                'id' => $id,
            ]
       );
    }
}