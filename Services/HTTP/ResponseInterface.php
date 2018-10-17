<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:15
 */

interface ResponseInterface
{
    /**
     * @return mixed
     */
    public function send();
}