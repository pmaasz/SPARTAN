<?php
/**
 * Created by PhpStorm.
 * Author: Philip Maaß
 * Date: 28.11.18
 * Time: 19:25
 * License: MIT
 */

namespace App\Repository;

use App\Services\Database;

/**
 * Class BaseRepository
 *
 * The Base Repository implements standard functions that all Repositories share. Some functions are fully implemented
 * others are only defined. That is why this class is abstract.
 */
abstract class BaseRepository
{
    /**
     * @var Database
     */
    protected $database;

    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function findOneBy(array $parameters)
    {
        $properties = [];

        foreach($parameters as $key => $value)
        {
            $properties[$key] = $key . ' = :' . $key;
        }

        $query = "SELECT * FROM " . $this->getTableName() . " WHERE ";
        $query .= \join(', ', $properties);
        $data = $this->database->query($query, $parameters);
        $data2 = $data[0];
        $entity = $this->arrayToObject($data2);

        return $entity;
    }

    /**
     * @param array $parameters
     *
     * @return array
     */
    public function findAllBy(array $parameters)
    {
        $properties = [];

        foreach($parameters as $key => $value)
        {
            $properties[$key] = $key . ' = :' . $key;
        }

        $query = "SELECT * FROM " . $this->getTableName() . " WHERE ";
        $query .= \join(', ', $properties);
        $array = $this->database->query($query, $parameters);
        $entities = [];

        foreach($array as $result)
        {
            $entity = $this->arrayToObject($result);
            $entities[] = $entity;
        }

        return $entities;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $query = "SELECT * FROM " . $this->getTableName();
        $array = $this->database->query($query);
        $entities = [];

        foreach($array as $result)
        {
            $entity = $this->arrayToObject($result);
            $entities[] = $entity;
        }

        return $entities;
    }

    /**
     * @return string
     */
    abstract protected function getTableName();

    /**
     * @param $array
     *
     * @return mixed
     */
    abstract protected function arrayToObject($array);
}
