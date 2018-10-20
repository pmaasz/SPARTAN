<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:15
 */

/**
 * Class Example
 *
 * This object is an entity which reflects a data-model in our database. It consists of attributes, getter- and setter-
 * functions.
 */

class Example
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var mixed
     */
    private $attribute;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $attribute
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * @return mixed
     */
    public function getAttribute()
    {
        return $this->attribute;
    }
}