<?php declare(strict_types=1);

namespace App\Infrastructure\ORM\Doctrine\Repository;

use App\Infrastructure\ORM\Entity;
use App\Infrastructure\ORM\Repository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

final readonly class DoctrineRepository implements Repository
{
    private EntityRepository $entityRepository;

    public function __construct(private EntityManagerInterface $entityManager, string $entity)
    {
        $this->entityRepository = $entityManager->getRepository($entity);
    }

    public function findOneBy(array $array): ?Entity
    {
        return $this->entityRepository->findOneBy($array);
    }

    public function save(Entity $entity): void
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
}
