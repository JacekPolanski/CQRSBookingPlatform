<?php declare(strict_types=1);

namespace App\Infrastructure\QueryBus;

use App\Application\Query\Query;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerQueryBus implements QueryBus
{
    use HandleTrait {
        handle as handleQuery;
    }

    public function __construct(private readonly MessageBusInterface $queryBus)
    {
    }

    public function handle(Query $message): mixed
    {
        return $this->handleQuery($message);
    }
}
