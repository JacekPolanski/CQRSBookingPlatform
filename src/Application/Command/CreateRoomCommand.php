<?php declare(strict_types=1);

namespace App\Command;

final readonly class CreateRoomCommand implements Command
{
    public function __construct(
        public string $name,
        public int $count,
    ) {}
}
