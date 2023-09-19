<?php declare(strict_types=1);

namespace App\CommandBus;

use App\Command\Command;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerCommandBus implements CommandBus
{
    public function __construct(private readonly MessageBusInterface $commandBus)
    {}

    public function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
