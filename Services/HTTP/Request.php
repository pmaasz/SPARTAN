<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:15
 */

/**
 * The Request Object holds everything our client sends to the server via request. We use this class to save the $_GET
 * and $_POST into our ParameterBag by creating new instances of that class for each parameter.
 */

require_once __DIR__ . '/ParameterBag.php';

class Request
{
    /**
     * @var ParameterBag
     */
    protected $get;

    /**
     * @var ParameterBag
     */
    protected $post;

    /**
     * @var ParameterBag
     */
    protected $file;

    /**
     * Request constructor.
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
     * @return ParameterBag
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @return ParameterBag
     */
    public function getPost()
    {
        return $this->post;
    }

    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return bool
     */
    public function isPostRequest()
    {
        return !$this->post->isEmpty();
    }
}