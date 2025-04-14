<?php declare(strict_types=1);

namespace ProductViewer\Repositories;

interface RepositoryInterface
{
    public function findAll(): array;

    public function findByAttribute(mixed $param, string $attribute): array;

}