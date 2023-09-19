<?php

namespace App\QueryBus;

use App\Query\Query;

interface QueryBus
{
    public function handle(Query $message): mixed;
}
