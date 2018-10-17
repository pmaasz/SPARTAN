<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:15
 */

session_start();

require_once __DIR__ .'/Services/HTTP/Request.php';
require_once __DIR__ .'/Services/HTTP/Response.php';
require_once __DIR__ .'/Services/HTTP/ResponseRedirect.php';
require_once __DIR__ .'/Services/HTTP/ResponseInterface.php';

$controllerName = "";
$actionName = "";

if(isset($_GET['controller']))
{
    $controllerName = $_GET['controller'];
}

if(isset($_GET['action']))
{
    $actionName = $_GET['action'];
}

require_once __DIR__.'/Controller/'.$controllerName.'.php';

$request = new Request($_GET, $_POST);

/** @var mixed $controller */
$controller = new $controllerName();

/**
 * @var ResponseInterface $response
 */
$response = $controller->$actionName($request);

$response->send();