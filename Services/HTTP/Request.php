<?php

require_once __DIR__.'/ParameterBag.php';

class Request
{
    /**
     * @var ParameterBag
     */
    protected $query;

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
    public function getQuery()
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
    public function isPostRequest(){
        return !$this->post->isEmpty();
    }
}