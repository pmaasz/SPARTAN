<?php
/**
 * Created by PhpStorm.
 * Author: Philip Maaß
 * Date: 12.03.19
 * Time: 16:15
 * License: MIT
 */

namespace App\Services;

/**
 * Class ConfigService
 */
class ConfigService
{
    use Singleton;

    /**
     * @var array
     */
    protected $configuration;

    /**
     * ConfigService constructor.
     */
    public function __construct()
    {
        $this->configuration = [];
    }

    /**
     * Load a configuration file in .json format.
     *
     * @param string $file
     */
    public function load($file)
    {
        if(!file_exists($file))
        {
            throw new \UnexpectedValueException(
                \sprintf("The configuration file '%s' does not exists", $file)
            );
        }

        $content = file_get_contents($file);
        $config = json_decode($content, true);

        $this->configuration = array_merge($this->configuration, $config);
    }

    /**
     * Get a configuration value by it's name.
     *
     * @param string $name
     *
     * @return string
     */
    public function get($name)
    {
        if(isset($this->configuration[$name]))
        {
            return $this->configuration[$name];
        }

        return null;
    }

    /**
     * Get all configuration values.
     *
     * @return array
     */
    public function getAll()
    {
        return $this->configuration;
    }

    /**
     * Set a configuration value by it's name.
     *
     * @param string $name
     * @param string $value
     */
    public function set($name, $value)
    {
        $this->configuration[$name] = $value;
    }
}