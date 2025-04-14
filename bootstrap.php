<?php declare(strict_types = 1);
const BASE_DIR = __DIR__;
require BASE_DIR . '/vendor/autoload.php';
use League\Container\Container;
use League\Container\ReflectionContainer;
use Symfony\Component\HttpFoundation\Request;

$container = new Container();
$container->delegate(new ReflectionContainer(true));
$container->add(Request::class, function () {
    return Request::createFromGlobals();
});

