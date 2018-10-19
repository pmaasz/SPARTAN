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

require_once __DIR__.'/ParameterBag.php';

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
     * Request constructor.
     *
     * @param array $queryData
     * @param array $postData
     */
    public function __construct(array $queryData = array(), array $postData = array())
    {
        $this->query = new ParameterBag($queryData);
        $this->post = new ParameterBag($postData);
    }

    /**
     * @return ParameterBag
     */
    public function getGet()
    {
        return $this->query;
    }

    /**
     * @return ParameterBag
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return bool
     */
    public function isPostRequest()
    {
        return !$this->post->isEmpty();
    }
}