<?php

namespace App\Infrastructure\ORM;


interface RepositoryFactory
{
    public function getFor(string $entity): Repository;
}
