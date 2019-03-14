<?php
/**
 * Created by PhpStorm.
 * User: Philip Maaß
 * Date: 17.10.18
 * Time: 20:15
 */

namespace App\Services\HTTP;

/**
 * Class ResponseRedirect
 *
 * The ResponseRedirect does the same as the Response object. The difference is the location the user is directed to.
 * Instead of loading the same page again we can redirect to a new page. Example would be the saving of a form and
 * redirecting to the page where the saved data is shown.
 */
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