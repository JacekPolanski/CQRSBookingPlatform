<?php declare(strict_types=1);

namespace App\Infrastructure\CommandBus;

use App\Application\Command\Command;
use Symfony\Component\Messenger\MessageBusInterface;

final readonly class MessengerCommandBus implements CommandBus
{
    public function __construct(private MessageBusInterface $commandBus)
    {}

    public function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
