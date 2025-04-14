<?php declare(strict_types = 1);

namespace Autodeal\Presentation\templates\SignUp;

use Autodeal\Presentation\templates\AbstractRender;

class SignUpRender extends AbstractRender
{
    protected string $template = 'sign_in.twig';
    public function __construct()
    {
        $path = BASE_DIR . '/src/Presentation/templates/SignIn'; // полный путь к папке
        parent::__construct($path);
    }
}