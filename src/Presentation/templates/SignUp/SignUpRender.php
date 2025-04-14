<?php declare(strict_types = 1);

namespace Autodeal\Presentation\templates\SignUp;

use Autodeal\Presentation\templates\AbstractRender;

class SignUpRender extends AbstractRender
{
    protected string $template = 'sign_in.twig';
    public function __construct()
    {
        parent::__construct();
    }
}