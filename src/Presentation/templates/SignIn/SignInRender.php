<?php declare(strict_types = 1);

namespace ProductViewer\Presentation\templates\SignIn;

use ProductViewer\Presentation\templates\AbstractRender;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class SignInRender extends AbstractRender
{
    protected string $templateName = 'sign_in.twig';
    protected string $path = BASE_DIR . '/src/Presentation/templates/SignIn/';

    public function __construct()
    {
        $this->twig = new Environment(new FilesystemLoader($this->getPath()));
        parent::__construct($this->getPath());
    }
}