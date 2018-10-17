<?php

require_once 'Singleton.php';

class Templating
{
    use Singleton;

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