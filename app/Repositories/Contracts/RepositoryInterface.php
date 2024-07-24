<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    /**
     * Should return all records
     * @return mixed
     */
    public function findAll();

    /**
     * Should create a new record
     * @param $data
     */
    public function create($data);

    /**
     * Should return a record by id
     * @param int $id
     */
    public function find(int $id);

    /**
     * Should update a record by id
     * @param int $id
     * @param $data
     */
    public function update(int $id, $data);

    /**
     * Should delete a record by id
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}