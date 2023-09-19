<?php declare(strict_types=1);

namespace App\Domain\Room;

class Room
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $count,
        public readonly int $bookedCount
    ) {}
}
