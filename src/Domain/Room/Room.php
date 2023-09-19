<?php declare(strict_types=1);

namespace App\Domain\Room;

use Ramsey\Uuid\Uuid;

class Room
{
    private function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly int $count,
        public readonly int $bookedCount
    ) {}

    public static function createNew(string $name, int $count): self
    {
        return new self(Uuid::uuid4()->toString(), $name, $count, 0);
    }
}
