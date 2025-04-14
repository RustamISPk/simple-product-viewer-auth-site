<?php declare(strict_types = 1);

namespace Autodeal\Controllers;

use Autodeal\Presentation\templates\SignIn\SignInRender;
use Autodeal\Presentation\templates\SignUp\SignUpRender;
use Autodeal\Repositories\UsersRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    
    public function showReg(): Response
    {
        return $this->signUpRender->renderTemplate();
    }

    public function signIn(): JsonResponse {
        $formData = [
          'login' => $this->request->get('login'),
          'password' => $this->request->get('password'),
        ];

        $dbData = $this->usersRepository->checkUserPassword($formData['login'], $formData['password']);
        return new JsonResponse(['success' => $dbData]);
    }

    public function signUp(): void {
        $formData = [
            'login' => $this->request->get('login'),
            'password' => $this->request->get('password'),
        ];
        $this->usersRepository->addUser($formData['login'], $formData['password']);
    }
}