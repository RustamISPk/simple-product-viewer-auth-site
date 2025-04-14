<?php declare(strict_types = 1);

namespace ProductViewer\Controllers;

use ProductViewer\Repositories\RepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class AbstractController implements ControllerInterface
{
    public function __construct(private readonly Request    $request,
                                private readonly RepositoryInterface $repository) {
    }
    public function show(): Response
    {
        $method = $this->request->getMethod();
        return new Response('hello word ' . $method, Response::HTTP_OK, []);
    }
}