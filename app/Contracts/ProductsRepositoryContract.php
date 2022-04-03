<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProductsRepositoryContract extends BaseRepositoryContract
{
    /**
     * @param int $type_id
     * @param string $name
     * @param array $attribute_data
     * @return Model
     */
    public function create(int $type_id, string $name, array $attribute_data = []): Model;

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
     * @return Model | null
     */
    public function getByName(string $name): Model | null;

    /**
     * @param array $data
     * @return Model
     */
    public function createType(string $name): Model;

    /**
     * @return Collection
     */
    public function getTypes(): Collection;

    /**
     * @param int $id
     * @return Model | null
     */
    public function getTypeById(int $id): Model | null;

    /**
     * @param string $name
     * @return Model | null
     */
    public function getTypeByName(string $name): Model | null;

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function updateType(int $id, array $data): Model;

    /**
     * @param int $id
     * @return bool
     */
    public function destroyType(int $id): bool;

}
