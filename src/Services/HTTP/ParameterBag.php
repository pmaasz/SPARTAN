<?php
/**
 * Created by PhpStorm.
 * User: Philip Maaß
 * Date: 17.10.18
 * Time: 20:15
 */

namespace App\Services\HTTP;

/**
 * Class ParameterBag
 *
 * The ParameterBag holds all of our $_GET or $_POST request parameters in form of an array.
 */
class ParameterBag
{
    /**
     * This array holds the elements of our $_POST, $_GET or $_Files array.
     *
     * @var array
     */
    private $elements;

    /**
     * ParameterBag constructor.
     *
     * When a new object of the ParameterBag is made we initiate it with a global array variable which fills our $elements
     * array.
     *
     * @param array $elements
     */
    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    /**
     * The $key variable is a string an a placeholder for the key inside of the global array variable. Before we return
     * the value to the given key we ask if that key value pair exists.
     *
     * @param string $key
     *
     * @return mixed
     *
     * @throws \UnexpectedValueException
     */
    public function get($key)
    {
        if(!$this->hasKey($key))
        {
            return false;
        }

        return $this->elements[$key];
    }

    /**
     * This function makes sure our key exists inside of our array and is used before we return the value of the given
     * key inside the get function of this class. We use the isset function implemented in PHP(see PHP Manual for
     * explanation),
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasKey($key)
    {
        return isset($this->elements[$key]);
    }

    /**
     * This function tests if our global array variable is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->elements);
    }
}
