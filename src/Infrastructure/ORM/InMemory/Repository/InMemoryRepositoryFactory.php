<?php declare(strict_types=1);

namespace App\Infrastructure\ORM\InMemory\Repository;

use App\Infrastructure\ORM\Repository;
use App\Infrastructure\ORM\RepositoryFactory;

class InMemoryRepositoryFactory implements RepositoryFactory
{
    public function getFor(string $entity): Repository
    {
        return new InMemoryRepository();
    }
}
