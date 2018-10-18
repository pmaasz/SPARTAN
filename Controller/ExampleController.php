<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:14
 */

require_once __DIR__ . '/../Services/Database.php';
require_once __DIR__ . '/../Services/Templating.php';
require_once __DIR__ . '/../Services/AlertMessages.php';
require_once __DIR__ . '/../Repository/ExampleRepository.php';

class ExampleController
{
    /**
     * @var ExampleRepository
     */
    private $exampleRepository;

    public function __construct()
    {
        $this->exampleRepository = new ExampleRepository();
    }

    public function indexAction()
    {

    }

    public function createAction(Request $request)
    {

    }

    public function updateAction(Request $request)
    {

    }

    public function deleteAction(Request $request)
    {

    }
}