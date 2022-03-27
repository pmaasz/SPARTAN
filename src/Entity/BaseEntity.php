<?php
/**
 * Created by PhpStorm.
 * Author: Philip Maaß
 * Date: 27.03.22
 * Time: 03:08
 * License
 */

namespace Entity;

class BaseEntity
{
    /**
     * @var int
     */
    private $id;

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
}