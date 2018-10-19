<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:15
 */

require_once 'Singleton.php';

class Templating
{
    use Singleton;

    /**
     * @param $template
     * @param array $parameters
     * 
     * @return string
     */
    public function render($template, array $parameters = array())
    {
        ob_start();
        extract($parameters);
        include __DIR__ . '/../templates/' . $template;

        $content = ob_get_clean();

        return $content;
    }

    /**
     *bad code
     */
    public function backToIndex()
    {
        header('Location:');
        exit;
    }

}