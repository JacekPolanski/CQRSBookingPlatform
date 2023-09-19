<?php declare(strict_types=1);

namespace App\Domain\Room;

use App\Infrastructure\ORM\Repository;
use App\Infrastructure\ORM\RepositoryFactory;

final readonly class Rooms
{
    private Repository $repository;

    public function __construct(RepositoryFactory $repositoryFactory)
    {
        $this->repository = $repositoryFactory->getFor(Room::class);
    }

    public function existsWithName(string $name): bool
    {
        return $this->findByName($name) !== null;
    }

    public function add(Room $room): void
    {
        $this->repository->save($room);
    }

    private function findByName(string $name): ?Room
    {
        return $this->repository->findOneBy(['name' => $name]);
    }
}
