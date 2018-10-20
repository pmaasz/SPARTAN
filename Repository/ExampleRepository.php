<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:15
 */

/**
 * The Repository consists of functions that handle our data. These functions are called by the Controller and provide
 * the Controller with the data it needs to hand to a template. The Controller also tells uses these functions to update
 * data in the database or to insert new data. Every Entity has an dedicated Repository.
 */

require_once __DIR__ . "/../Services/Database.php";

class ExampleRepository
{
    /**
     * @param Example $example
     *
     * @return bool
     */
    public function persist(Example $example)
    {
        if($example->getId() !== null)
        {
            return $this->update($example);
        }

        return $this->insert($example);
    }

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
     * @param Example $example
     *
     * @return mixed
     */
    public function update(Example $example)
    {
        return Database::getInstance()->insert("UPDATE table SET parameter = :parameter WHERE id = :id", [
                'parameter' => $example->getAttribute(),
                'id' => $example->getId(),
            ]
        );
    }

    /**
     * @param Example $example
     *
     * @return mixed
     */
    public function delete(Example $example)
    {
       return Database::getInstance()->query('DELETE FROM table WHERE id = :id', [
                'id' => $example->getId(),
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