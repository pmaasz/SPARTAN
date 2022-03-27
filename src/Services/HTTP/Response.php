<?php
/**
 * Created by PhpStorm.
 * User: Philip Maaß
 * Date: 17.10.18
 * Time: 20:15
 */

namespace App\Services\HTTP;

/**
 * The response object is a response send from the server to the client. We send all our content as a big string back to
 * the browser for it to interpret into the page the user can see.
 */

use App\Services\HTTP\ResponseInterface;

/**
 * Class Response
 *
 * @package App\Services\HTTP
 */
class Response implements ResponseInterface
{
    /**
     * @var string
     */
    private $content;

    /**
     * Response constructor.
     *
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * This function echoes content as string to browser which is interpreted by the browser.
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

    /**
     * @param $header
     */
    public function addHeader($header)
    {
        header($header);
    }

    /**
     * @param $statusCode
     */
    public function setStatusCode($statusCode)
    {
        http_response_code($statusCode);
    }

    /**
     * @param $statusMessage
     */
    public function setStatusMessage($statusMessage)
    {
        $this->addHeader("HTTP/1.1 $statusMessage");
    }
}