<?php declare(strict_types=1);

namespace App\Domain\Room;

use App\Infrastructure\ORM\Entity;
use Ramsey\Uuid\Uuid;

readonly class Room implements Entity
{
    private function __construct(
        public string $id,
        public string $name,
        public int $count,
        public int $bookedCount
    ) {}

    public static function createNew(string $name, int $count): self
    {
        return new self(Uuid::uuid4()->toString(), $name, $count, 0);
    }
}
