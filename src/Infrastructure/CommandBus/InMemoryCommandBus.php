<?php declare(strict_types=1);

namespace App\Infrastructure\CommandBus;

use App\Application\Command\Command;
use App\Infrastructure\CommandHandler\CommandHandler;

class InMemoryCommandBus implements CommandBus
{
    /**
     * @var CommandHandler[]
     */
    private array $handlers = [];

    public function registerHandler(string $commandName, callable $handler): void
    {
        $this->handlers[$commandName] = $handler;
    }

    public function dispatch(Command $command): void
    {
        $handler = $this->handlers[$command::class];
        $handler($command);
    }
}
