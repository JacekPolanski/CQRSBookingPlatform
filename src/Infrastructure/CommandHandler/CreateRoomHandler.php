<?php declare(strict_types=1);

namespace App\CommandHandler;

use App\Command\CreateRoomCommand;
use App\Domain\Room\Room;
use App\Domain\Room\RoomRepository;
use App\Exception\RoomNameTaken;

final readonly class CreateRoomHandler implements CommandHandler
{
    public function __construct(private RoomRepository $rooms)
    {}

    public function __invoke(CreateRoomCommand $command): void
    {
        if ($this->rooms->existsWithName($command->name)) {
            throw RoomNameTaken::withName($command->name);
        }

        $room = Room::createNew($command->name, $command->count);
        $this->rooms->add($room);
    }
}
