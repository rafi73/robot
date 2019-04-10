<?php

namespace App\Contracts;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 */
interface RepositoryInterface
{
    public function getAll();

    public function find(int $id);

    public function create(array $request);

    public function update(array $request, int $id);

    public function delete(int $id);
}
