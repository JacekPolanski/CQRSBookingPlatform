<?php declare(strict_types=1);

namespace App\Shared\Domain\Room;

use App\Domain\Room\Room;
use App\Domain\Room\Rooms;

class RoomsStub implements Rooms
{
    /**
     * @var Room[]
     */
    private array $rooms = [];

    public function existsWithName(string $name): bool
    {
        $filtered = array_filter($this->rooms, fn (Room $room) => $room->name === $name);

        return count($filtered) === 1;
    }

    public function add(Room $room): void
    {
        $this->rooms[$room->id] = $room;
    }
}
