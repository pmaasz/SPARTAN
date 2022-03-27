<?php
/**
 * Created by PhpStorm.
 * User: Philip Maaß
 * Date: 17.10.18
 * Time: 20:15
 */

namespace App\Services;

/**
 *The Templating class marries our data with our template to convert it into a big string for the browser to interpret
 * and generate the view for the user.
 */

/**
 * Class Templating
 *
 * @package App\Services
 */
class Templating
{
    use Singleton;

    /**
     * @var mixed
     */
    private $layout = __DIR__ . '/../templates/layout.php';

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

        $content = __DIR__ . '/../templates/' . $template;

        include $this->layout;

        $content = ob_get_clean();

        return $content;

    }

    /**
     * bad code because of exit function.
     * we can replicate the same functionality by redirecting to our index.php in public.
     * There we use our default Controller and default action.
     */
    public function backToIndex()
    {
        header('Location:');
        exit;
    }
}