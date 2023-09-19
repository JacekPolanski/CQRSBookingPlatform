<?php declare(strict_types=1);

namespace App\Infrastructure\Exception;

class RoomNameTaken extends \RuntimeException
{
    public static function withName(string $name): RoomNameTaken
    {
        return new self("Room with name {$name} already exists.");
    }
}
