<?php declare(strict_types=1);

namespace App\Domain\Room;

use App\Infrastructure\ORM\EntityManager\EntityManager;
use Doctrine\ORM\EntityRepository;

final readonly class RoomRepository
{
    private EntityRepository $repository;

    public function __construct(private EntityManager $entityManager)
    {
        $this->repository = $this->entityManager->getRepository(Room::class);
    }

    public function existsWithName(string $name): bool
    {
        return $this->findByName($name) !== null;
    }

    public function add(Room $room): void
    {
        $this->entityManager->persist($room);
        $this->entityManager->flush();
    }

    private function findByName(string $name): ?Room
    {
        return $this->repository->findOneBy(['name' => $name]);
    }
}
