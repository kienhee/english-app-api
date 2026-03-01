<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    /**
     * Summary of getAll
     * @return void
     */
    public function getAll();

    /**
     * Summary of getById
     * @param mixed $id
     * @return void
     */
    public function getById($id);

    /**
     * @param array $data
     * @return mixed Created model instance
     */
    public function create(array $data): mixed;

    /**
     * Summary of update
     * @param array $data
     * @param mixed $id
     * @return void
     */
    public function update(array $data, $id);
    
    /**
     * Summary of delete
     * @param mixed $id
     * @return void
     */
    public function delete($id);
}