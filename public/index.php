<?php
/**
 * Created by PhpStorm.
 * User: Philip Maaß
 * Date: 17.10.18
 * Time: 20:15
 * License: MIT
 */

/**
 * The index.php is the beginning and the end of our application. An incoming request of the client is handled here and
 * routed to the correct classes and functions. Also the response given by the server to the client is send from here.
 */

/**
 * The Session is a global variable (array). This means you can access this array everywhere in your code via the
 * $_SESSION call. Those variables are also called superglobal variables. The session is also using a
 * Singleton-Pattern|Trait. Calling the function session_start() creates a new Session object or uses an already
 * existing one. The Session is time limited an 'dissolves' after a set period of time.
 */
session_start();

require_once __DIR__ . '/Autoloader.php';

Autoloader::register("App", "src");

use App\Services\HTTP\Request;
use App\Services\HTTP\ResponseInterface;
use App\Services\ConfigService;

ConfigService::getInstance();//->load(__DIR__ . '/../config/config.json');

$controllerName = "ExampleController";
$actionName = "indexAction";

if(isset($_GET['controller']))
{
    $controllerName = $_GET['controller'];
}

if(isset($_GET['action']))
{
    $actionName = $_GET['action'];
}

require_once __DIR__ . '/../Controller/' . $controllerName . '.php';

$request = new Request($_GET, $_POST, $_FILES);
/** @var mixed $controller */
$controller = new $controllerName();
/** @var ResponseInterface $response */
$response = $controller->$actionName($request);

$response->send();