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
     * @return int
     */
    private $createDate;

    /**
     * @return int
     */
    private $changeDate;

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
     * @return int
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param int $createDate
     */
    public function setCreateDate($createDate)
    {
        if(is_string($createDate)) {
            $createDate = strtotime($createDate);
        }

        $this->createDate = $createDate;
    }

    /**
     * @param int $changeDate
     */
    public function setChangeDate($changeDate)
    {
        if(is_string($changeDate)) {
            $changeDate = strtotime($changeDate);
        }

        $this->changeDate = $changeDate;
    }

    /**
     * @return int
     */
    public function getChangeDate()
    {
        return $this->changeDate;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->id;
    }
}