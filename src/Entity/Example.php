<?php
/**
 * Created by PhpStorm.
 * User: Philip Maaß
 * Date: 17.10.18
 * Time: 20:15
 */

namespace App\Entity;

use Entity\BaseEntity;

/**
 * Class Example
 *
 * This object is an entity which reflects a data-model in our database. It consists of attributes, getter- and setter-
 * functions.
 */
class Example extends BaseEntity
{
    /**
     * @var string
     */
    private $attribute;

    /**
     * @param $attribute
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * @return string
     */
    public function getAttribute()
    {
        return $this->attribute;
    }
}