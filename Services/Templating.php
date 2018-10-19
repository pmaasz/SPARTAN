<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:15
 */

/**
 *
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
     *bad code because of exit function.
     * we can replicate the same functionality by redirecting to our index.php in public.
     * There we use our default Controller and default action.
     */
    public function backToIndex()
    {
        header('Location:');
        exit;
    }
}