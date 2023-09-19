<?php

namespace App\Infrastructure\CommandHandler;

use App\Application\Command\Command;

interface CommandHandler
{
    public function __invoke(Command $command): void;
}
