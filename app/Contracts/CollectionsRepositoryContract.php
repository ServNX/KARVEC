<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CollectionsRepositoryContract extends BaseRepositoryContract
{
    /**
     * @param int $group_id
     * @param string $name
     * @param array $attribute_data
     * @return Model
     */
    public function create(int $group_id, string $name, array $attribute_data = []): Model;

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model;

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool;

    /**
     * @param string $name
     * @return Model|null
     */
    public function getByName(string $name): Model|null;

    /**
     * @param array $filter
     * @return Collection
     */
    public function getGroups(array $filter = []): Collection;

    /**
     * @param string $name
     * @return Model|null
     */
    public function getGroupByName(string $name): Model|null;

    /**
     * @param string $handle
     * @return Model|null
     */
    public function getGroupByHandle(string $handle): Model|null;

    /**
     * @param int $id
     * @return Model|null
     */
    public function getGroupById(int $id): Model|null;

    /**
     * @param array $data
     * @return Model
     */
    public function createGroup(string $name, string $handle = null): Model;

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function updateGroup(int $id, array $data = []): Model;

    /**
     * @param int $id
     * @return bool
     */
    public function destroyGroup(int $id): bool;

}
