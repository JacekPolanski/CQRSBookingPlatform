<?php declare(strict_types=1);

namespace App\Shared\Application\Command;

use App\Application\Command\CreateRoomCommand;

class CreateRoomCommandMother
{
    public static function withName(string $name): CreateRoomCommand
    {
        return new CreateRoomCommand($name, rand(1, 999));
    }
}
