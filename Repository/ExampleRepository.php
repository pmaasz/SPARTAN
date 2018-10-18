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
    /**
     * @return mixed
     */
    public function findAll()
    {
        $result = Database::getInstance()->query("SELECT * FROM table")[0];

        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findById($id)
    {
        $result = Database::getInstance()->query("SELECT * FROM table WHERE id = :id", [
                'id' => $id,
            ]
        )[0];

        return $result;
    }

    /**
     * @param $parameter
     *
     * @return mixed
     */
    public function insert($parameter)
    {
        return Database::getInstance()->insert("INSERT INTO table SET parameter = :parameter", [
                'parameter' => $parameter,
            ]
        );
    }

    /**
     * @param $parameter
     *
     * @return mixed
     */
    public function update($parameter)
    {
        return Database::getInstance()->insert(
            "UPDATE table SET parameter = :parameter", [
                'parameter' => $parameter,
            ]
        );

    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
       return Database::getInstance()->query('DELETE FROM table WHERE id = :id', [
                'id' => $id,
            ]
       );
    }
}