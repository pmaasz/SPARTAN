<?php
/**
 * Created by PhpStorm.
 * User: Philip Maaß
 * Date: 17.10.18
 * Time: 20:15
 */

namespace App\Services\HTTP;

/**
 * The Request Object holds everything our client sends to the server via request. We use this class to save the $_GET
 * and $_POST into our ParameterBag by creating new instances of that class for each parameter.
 */

require_once __DIR__ . '/ParameterBag.php';

/**
 * Class Request
 *
 * @package App\Services\HTTP
 */
class Request
{
    /**
     * This variable holds an instance of the object ParameterBag that is instantiated with the global variable $_GET.
     *
     * @var ParameterBag
     */
    protected $get;

    /**
     * This variable holds an instance of the object ParameterBag that is instantiated with the global variable $_POST.
     *
     * @var ParameterBag
     */
    protected $post;

    /**
     * This variable holds an instance of the object ParameterBag that is instantiated with the global variable $_FILES.
     *
     * @var ParameterBag
     */
    protected $file;

    /**
     * Request constructor.
     *
     * When a new Request object is instantiated, three ParameterBags are build to holt the parameters of the globals
     * $_GET, $_POST and $_FILES. Those globals are given in the index.php, our entry point to the application.
     *
     * @param array $getData
     * @param array $postData
     * @param array $fileData
     */
    public function __construct(array $getData = array(), array $postData = array(), $fileData = array())
    {
        $this->get = new ParameterBag($getData);
        $this->post = new ParameterBag($postData);
        $this->file = new ParameterBag($fileData);
    }

    /**
     * This function return the elements of the $_GET variable.
     *
     * @return ParameterBag
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * This function return the elements of the $_POST variable.
     *
     * @return ParameterBag
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * This function return the elements of the $_FILES variable.
     *
     * @return ParameterBag
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * This function evaluates if the request sent holds a $_POST array with values.
     *
     * @return bool
     */
    public function isPostRequest()
    {
        return !$this->post->isEmpty();
    }
}