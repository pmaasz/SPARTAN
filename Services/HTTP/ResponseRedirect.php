<?php

class ResponseRedirect implements ResponseInterface
{
    /**
     * @var string
     */
    private $location;

    /**
     * ResponseRedirect constructor.
     * @param $location
     */
    public function __construct($location)
    {
        $this->location = $location;
    }

    /**
     * returns header
     */
    public function send()
    {
        header('Location: '. $this->location);
    }


}