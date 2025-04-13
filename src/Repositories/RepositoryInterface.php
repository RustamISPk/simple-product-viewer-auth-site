<?php

namespace Autodeal\Repositories;

interface RepositoryInterface
{
    public function findAll(): array;

    public function findByAttribute(mixed $param, string $attribute): array;

}