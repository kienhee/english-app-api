<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
    public function register(array $data): mixed
    {
        return $this->create($data);
    }

    public function findByEmail(string $email): mixed
    {
        return $this->model->where('email', $email)->first();
    }

    public function getUsers(): mixed
    {
        return $this->model->all();
    }
}