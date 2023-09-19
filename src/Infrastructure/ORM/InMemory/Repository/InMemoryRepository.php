<?php declare(strict_types=1);

namespace App\Infrastructure\ORM\InMemory\Repository;

use App\Infrastructure\ORM\Entity;
use App\Infrastructure\ORM\Repository;

class InMemoryRepository implements Repository
{
    /**
     * @var Entity[]
     */
    private array $entities = [];

    public function findOneBy(array $array): ?Entity
    {
        $field = array_keys($array)[0];
        $value = array_values($array)[0];
        $filtered = array_filter($this->entities, fn (Entity $entity) => $entity->$field === $value);

        return count($filtered) > 0 ? end($filtered) : null;
    }

    public function save(Entity $entity): void
    {
        $this->entities[$entity->id] = $entity;
    }
}
