<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:14
 */

require_once __DIR__ . '/../Services/Templating.php';
require_once __DIR__ . '/../Services/AlertMessages.php';
require_once __DIR__ . '/../Repository/ExampleRepository.php';

class ExampleController
{
    /**
     * @var ExampleRepository
     */
    private $exampleRepository;

    /**
     * ExampleController constructor.
     */
    public function __construct()
    {
        $this->exampleRepository = new ExampleRepository();
    }

    /**
     * @return Response
     */
    public function indexAction()
    {
        $result = $this->exampleRepository->findAll();

        return new Response(Templating::getInstance()->render('index.php', [
            'result' => $result
        ]));
    }

    /**
     * @param Request $request
     *
     * @return Response|ResponseRedirect
     */
    public function createAction(Request $request)
    {
        if ($request->isPostRequest())
        {
            $parameters[] = $request->getPost()->get('parameter');

            $this->exampleRepository->insert($parameters);

            return new ResponseRedirect('index.php');
        }

        return new Response(Templating::getInstance()->render('form.php'));
    }

    /**
     * @param Request $request
     *
     * @return Response|ResponseRedirect
     */
    public function updateAction(Request $request)
    {
        $id = $request->getGet()->get('id');
        $parameters[] = $request->getPost()->get('parameter');
        $result = $this->exampleRepository->findById($id);

        if ($request->isPostRequest())
        {
            $this->exampleRepository->update($parameters, $id);

            return new ResponseRedirect('index.php');
        }

        return new Response(Templating::getInstance()->render('form.php', [
            'result' => $result,
        ]));
    }

    public function deleteAction(Request $request)
    {

    }
}