<?php

namespace App\Infrastructure\CommandBus;

use App\Application\Command\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}
