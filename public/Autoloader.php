<?php
/**
 * Created by PhpStorm.
 * Author: Philip Maaß
 * Date: 12.03.19
 * Time: 19:06
 * License: MIT
 */

/**
 * Class Autoloader
 */
class Autoloader
{
    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $target;

    /**
     * @param $prefix
     * @param $target
     */
    public static function register($prefix, $target)
    {
        $autoloader = new Autoloader();

        $autoloader->prefix = $prefix;
        $autoloader->target = $target;

        spl_autoload_register([$autoloader, 'loadClass']);
    }

    /**
     * @param $className
     */
    public function loadClass($className)
    {
        $path = str_replace('\\', '/', $className);
        $path = str_replace($this->prefix, $this->target, $path);
        $filename = __DIR__ . '/' . $path . 'php';

        if(file_exists($filename))
        {
            require_once $filename;
        }
    }
}