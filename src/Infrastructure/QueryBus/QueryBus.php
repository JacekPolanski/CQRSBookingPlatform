<?php

namespace App\Infrastructure\QueryBus;

use App\Application\Query\Query;

interface QueryBus
{
    public function handle(Query $message): mixed;
}
