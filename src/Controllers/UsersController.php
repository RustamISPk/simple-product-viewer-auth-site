<?php declare(strict_types = 1);

namespace Autodeal\Controllers;

use Autodeal\Presentation\templates\SignIn\SignInRender;
use Autodeal\Presentation\templates\SignUp\SignUpRender;
use Autodeal\Repositories\UsersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends AbstractController
{
    public function __construct(private readonly Request         $request,
                                private readonly UsersRepository $usersRepository,
                                private readonly SignInRender $render,
                                private readonly SignUpRender $signUpRender)
    {
        parent::__construct($this->request, $this->usersRepository);
    }

    public function show(): Response
    {
        return $this->render->renderTemplate();
    }

    public function showWrognData(): Response
    {
        return $this->render->renderTemplate(['check' => false]);
    }
    
    public function showReg(): Response
    {
        return $this->render->renderTemplate();
    }

}