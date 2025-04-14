<?php declare(strict_types=1);

namespace ProductViewer\Presentation\templates;

use Symfony\Component\HttpFoundation\Response;

interface RenderInterface
{
    public function renderTemplate($params = []): Response;
}