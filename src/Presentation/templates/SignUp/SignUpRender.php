<?php declare(strict_types = 1);

namespace Autodeal\Presentation\templates\SignUp;

use Autodeal\Presentation\templates\AbstractRender;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class SignUpRender extends AbstractRender
{
    protected string $templateName = 'sign_up.twig';
    protected string $path = BASE_DIR . '/src/Presentation/templates/SignUp/';

    public function __construct()
    {
        $this->twig = new Environment(new FilesystemLoader($this->getPath()));
        parent::__construct($this->getPath());
    }
}