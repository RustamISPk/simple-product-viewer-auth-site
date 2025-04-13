<?php declare(strict_types = 1);

namespace Autodeal\Controllers;
use Autodeal\Repositories\ProductsRepository;
use Autodeal\Repositories\UsersRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
class TestController extends AbstractController
{
    public function __construct(private readonly Request         $request,
                                private readonly UsersRepository $usersRepository)
    {
        parent::__construct($this->request, $this->usersRepository);
    }
    public function test(): JsonResponse
    {
        return new JsonResponse(["response" => "hello world"]);
    }

    public function test2(): JsonResponse {
        $a = new ProductsRepository();
        return new JsonResponse($a->getProductsByPage(10));
    }
    public function test3(): JsonResponse {
        $a = new UsersRepository();
        return new JsonResponse($a->findAll());
    }



}