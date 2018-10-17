<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 15.10.18
 * Time: 21:44
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

    protected function __clone()
    {
    }

    public static function getInstance()
    {
        if( ! self::$instance )
        {
            self::$instance = new self();
        }

        return self::$instance;
    }
}