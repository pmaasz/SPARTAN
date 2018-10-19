<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 17.10.18
 * Time: 20:14
 */

/**
 * This is a Controller class. A Controller manages the data input and output by telling a Repository what to to with
 * new data and what data to give to channel to a Template for a user to view or manipulate.
 */


require_once __DIR__ . '/../Services/Templating.php';
require_once __DIR__ . '/../Repository/ExampleRepository.php';
require_once __DIR__ . '/../Entity/Example.php';

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
            $example = new Example($request->getPost()->get('attribute'));

            $this->exampleRepository->insert($example);

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

    /**
     * @param Request $request
     *
     * @return ResponseRedirect
     */
    public function deleteAction(Request $request)
    {
        $id = $request->getGet()->get('id');

        $this->exampleRepository->delete($id);

        return new ResponseRedirect('index.php');
    }
}