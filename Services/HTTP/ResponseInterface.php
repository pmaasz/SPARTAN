<?php
/**
 * Created by PhpStorm.
 * User: Philip Maaß
 * Date: 17.10.18
 * Time: 20:15
 */

/**
 * Interface ResponseInterface
 *
 * An Interface is a class that tells us which methods should exists without implementing a functionality. Every class
 * that implements an interface has to implement every method it holds. Our ResponseInterface tells us that the function
 * send exists which is used by two different objects.
 */

interface ResponseInterface
{
    /**
     * @return mixed
     */
    public function send();
}