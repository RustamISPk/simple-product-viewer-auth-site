<?php declare(strict_types = 1);

namespace Autodeal\Presentation\templates\SignIn;

use Autodeal\Presentation\templates\AbstractRender;

class SignInRender extends AbstractRender
{
    protected string $templateName = 'sign_in.twig';
    protected string $path = '';

    public function __construct()
    {
        $this->path = parent::getPath() . 'SignIn';
        parent::__construct();
    }
}