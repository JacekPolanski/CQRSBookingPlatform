<?php

namespace App\CommandBus;

use App\Command\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}
