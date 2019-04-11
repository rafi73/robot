<?php

namespace App\Contracts;

/*
 * Repository Interface
 */
interface RepositoryInterface
{
    public function getAll();

    public function find(int $id);

    public function create(array $request);

    public function update(array $request, int $id);

    public function delete(int $id);
}
