<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:15
 */

/**
 * Trait Singleton
 *
 * The trait Singleton can also be implemented as a pattern but in this particular case we use it as a trait. All it
 * does is preventing us from building thousands of instances from our objects when we only need one. You can find it
 * in different classes mainly service classes.
 */

trait Singleton
{
    protected static $instance;

    /**
     * Singleton constructor.
     */
    protected function __construct()
    {
    }

    /**
     * clones Object we want to use when calling the instance
     */
    protected function __clone()
    {
    }

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if( ! self::$instance )
        {
            self::$instance = new self();
        }

        return self::$instance;
    }
}