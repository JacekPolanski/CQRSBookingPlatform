<?php declare(strict_types=1);

namespace App\Infrastructure\ORM\Doctrine\Repository;

use App\Infrastructure\ORM\RepositoryFactory;
use Doctrine\ORM\EntityManagerInterface;

final readonly class DoctrineRepositoryFactory implements RepositoryFactory
{
    public function __construct(private EntityManagerInterface $entityManager)
    {}

    public function getFor(string $entity): DoctrineRepository
    {
        return new DoctrineRepository($this->entityManager, $entity);
    }
}
