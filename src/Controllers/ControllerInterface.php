<?php declare(strict_types=1);

namespace Autodeal\Controllers;

use Symfony\Component\HttpFoundation\Response;

interface ControllerInterface{
    public function show(): Response;
}