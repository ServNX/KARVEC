<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CollectionsInterface
{
    public function getGroupByHandle(Model $group, string $handle): Collection;
}
