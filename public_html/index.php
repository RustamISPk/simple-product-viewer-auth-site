<?php declare(strict_types = 1);

include __DIR__ . '/../bootstrap.php';

use Autodeal\Controllers\UsersController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FastRoute\Dispatcher;

$routes [] = [['GET'], '/', [UsersController::class, 'show']];
$routes [] = [['GET'], '/login', [UsersController::class, 'show']];

$request = Request::createFromGlobals();

/**
 * @var array $routes
 * @var League\Container\Container $container
 */

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) use ($routes) {
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
});

$route_info = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());

switch ($route_info[0]) {
    case Dispatcher::NOT_FOUND:
        (new Response('404 Not Found', Response::HTTP_NOT_FOUND))->send();
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        (new Response('405 Method Not Allowed', Response::HTTP_METHOD_NOT_ALLOWED))->send();
        break;
    case Dispatcher::FOUND:

        list($class_name, $method) = $route_info[1];
        $vars = $route_info[2];
        $controller =  $container->get($class_name);

        $controller->$method($vars)->send();

        break;
}