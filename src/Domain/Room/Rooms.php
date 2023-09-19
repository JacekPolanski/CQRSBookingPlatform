<?php

namespace App\Domain\Room;

interface Rooms
{
    public function existsWithName(string $name): bool;

    public function add(Room $room): void;
}
