<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:15
 */

require_once 'Singleton.php';

class AlertMessages
{
    use Singleton;

    /**
     * @return array
     */
    public function readMessage()
    {
        $messages = [];

        if(isset($_SESSION['messages']))
        {
            $messages = $_SESSION['messages'];
            unset($_SESSION['messages']);
        }

        return $messages;
    }

    /**
     * @return null
     */
    public function readType()
    {
        $type = null;

        if(isset($_SESSION['$type']))
        {
            $_SESSION['type'] = $type;

            unset($_SESSION['type']);

            return $type;
        }

        return false;
    }

    /**
     * @param $type
     * @param $message
     */
    public function write($type, $message)
    {
        if(!isset($_SESSION['messages']))
        {
            $_SESSION['messages'] = [];
        }
        $_SESSION['messages'][$type][] = $message;
    }
}