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
     * @param int $id
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
     * @param Example $example
     *
     * @return mixed
     */
    public function insert(Example $example)
    {
        return Database::getInstance()->insert("INSERT INTO table SET parameter = :parameter", [
                'parameter' => $example->getAttribute(),
            ]
        );
    }

    /**
     * @param array $parameters
     * @param int $id
     *
     * @return mixed
     */
    public function update(array $parameters, $id)
    {
        return Database::getInstance()->insert("UPDATE table SET parameter = :parameter WHERE id = :id", [
                'parameter' => $parameters['parameter'],
                'id' => $id,
            ]
        );

    }

    /**
     * @param int $id
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

    public function arrayToObject()
    {

    }

    public function ObjectToArray()
    {

    }
}