<?php

namespace Autodeal\Controllers;

use Autodeal\Repositories\UsersRepository;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends AbstractController
{
    public function __construct(private readonly Request $request,
                                private readonly UsersRepository $usersRepository)
    {
        parent::__construct($this->request, $this->usersRepository);

    }
}