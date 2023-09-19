<?php declare(strict_types=1);

namespace App\Test\Unit\Infrastructure\CommandHandler;

use App\Application\Command\CreateRoomCommand;
use App\Domain\Room\Room;
use App\Infrastructure\CommandBus\CommandBus;
use App\Infrastructure\CommandBus\InMemoryCommandBus;
use App\Infrastructure\CommandHandler\CreateRoomHandler;
use App\Infrastructure\Exception\RoomNameTaken;
use App\Shared\Application\Command\CreateRoomCommandMother;
use App\Shared\Domain\Room\RoomsStub;
use PHPUnit\Framework\TestCase;

class CreateRoomHandlerTest extends TestCase
{
    public function testRoomAlreadyCreated(): void
    {
        $rooms = new RoomsStub();
        $rooms->add(Room::createNew($name = 'sample', 1));

        $handler = new CreateRoomHandler($rooms);
        $this->commandBus->registerHandler(CreateRoomCommand::class, $handler);

        $this->expectException(RoomNameTaken::class);

        $this->commandBus->dispatch(CreateRoomCommandMother::withName($name));
    }

    public function testCreateRoom(): void
    {
        $handler = new CreateRoomHandler($rooms = new RoomsStub());
        $this->commandBus->registerHandler(CreateRoomCommand::class, $handler);
        $this->commandBus->dispatch(CreateRoomCommandMother::withName($name = 'sample'));

        $this->assertTrue($rooms->existsWithName($name));
    }

    protected CommandBus $commandBus;

    protected function setUp(): void
    {
        $this->commandBus = new InMemoryCommandBus();
    }
}
