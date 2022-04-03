<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryContract
{
    /**
     * @param array $filter
     * @return Collection
     */
    public function all(array $filter = []): Collection;

    /**
     * @param int $id
     * @return Model|null
     */
    public function getById(int $id): Model | null;
}
