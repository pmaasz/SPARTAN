<?php

require_once __DIR__ . '/ResponseInterface.php';

class Response implements ResponseInterface
{
    /**
     * @var string
     */
    private $content;

    /**
     * Response constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * echoes content as string to browser which is interpreted
     */
    public function send()
    {
        echo $this->content;
    }

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}