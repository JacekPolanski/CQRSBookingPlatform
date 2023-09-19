<?php declare(strict_types=1);

namespace App\Infrastructure\CommandHandler;

use App\Application\Command\Command;
use App\Application\Command\CreateRoomCommand;
use App\Domain\Room\Room;
use App\Domain\Room\Rooms;
use App\Infrastructure\Exception\InvalidCommandProvided;
use App\Infrastructure\Exception\RoomNameTaken;

final readonly class CreateRoomHandler implements CommandHandler
{
    public function __construct(private Rooms $rooms)
    {}

    public function __invoke(Command $command): void
    {
        if (!$command instanceof CreateRoomCommand) {
            throw new InvalidCommandProvided();
        }

        if ($this->rooms->existsWithName($command->name)) {
            throw RoomNameTaken::withName($command->name);
        }

        $room = Room::createNew($command->name, $command->count);
        $this->rooms->add($room);
    }
}
