<?php

namespace App\Infrastructure\ORM;

interface Repository
{
    public function findOneBy(array $array): ?Entity;

    public function save(Entity $entity): void;
}
