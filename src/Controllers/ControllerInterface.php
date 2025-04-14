<?php declare(strict_types=1);

namespace ProductViewer\Controllers;

use Symfony\Component\HttpFoundation\Response;

interface ControllerInterface{
    public function show(): Response;
}