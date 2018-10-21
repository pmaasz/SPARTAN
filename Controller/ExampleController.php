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
        $example = new Example();

        return $this->handleForm($request, $example);
    }

    /**
     * @param Request $request
     *
     * @return Response|ResponseRedirect
     */
    public function updateAction(Request $request)
    {
        $example = $this->exampleRepository->findById($request->getGet()->get('id'));

        return $this->handleForm($request, $example);
    }

    /**
     * @param Request $request
     *
     * @return ResponseRedirect
     */
    public function deleteAction(Request $request)
    {
        $this->exampleRepository->delete($request->getGet()->get('id'));

        return new ResponseRedirect('index.php');
    }

    /**
     * @param Request $request
     * @param Example $example
     *
     * @return Response|ResponseRedirect
     */
    private function handleForm(Request $request, Example $example)
    {
        $isValid = $this->validate($request);

        if($isValid)
        {
            $example = $this->exampleRepository->buildFromPost($request, $example);
            $result = $this->exampleRepository->persist($example);

            if ($result)
            {
                return new ResponseRedirect('index.php');
            }
        }

        return new Response(Templating::getInstance()->render('form.php', [
            'data' => $example
        ]));
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    private function validate(Request $request)
    {
        if ($request->isPostRequest())
        {
            $result = $this->exampleRepository->findForValidation($request);

            if (count($result))
            {
                return false;
            }
        }

        return true;
    }
}