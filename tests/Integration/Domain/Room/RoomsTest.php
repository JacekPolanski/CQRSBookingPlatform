<?php

namespace App\Test\Integration\Domain\Room;

use App\Domain\Room\Room;
use App\Domain\Room\Rooms;
use App\Infrastructure\ORM\InMemory\Repository\InMemoryRepositoryFactory;
use PHPUnit\Framework\TestCase;

class RoomsTest extends TestCase
{
    public function testExistsWithName(): void
    {
        $rooms = new Rooms(new InMemoryRepositoryFactory());
        $rooms->add(Room::createNew('test', 10));

        $this->assertTrue($rooms->existsWithName('test'));
    }
}
