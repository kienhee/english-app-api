<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Exception;

class UserService
{
    protected $userRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getUsers()
    {

        $users = $this->userRepository->getUsers();
        if (!$users) {
            throw new Exception('Không tìm thấy người dùng');
        }
        return [
            'status' => true,
            'message' => 'Lấy thông tin người dùng thành công',
            'data' => [
                'users' => $users,
                'total' => $users->count(),
            ],
        ];
        
    }
   
}
