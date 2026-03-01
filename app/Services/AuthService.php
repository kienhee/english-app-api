<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Summary of register
     */
    public function register(array $data)
    {
        $user = $this->userRepository->register($data);

        return [
            'status' => true,
            'message' => 'Đăng ký tài khoản thành công',
            'data' => [
                'user' => $user,
            ],
        ];
    }

    /**
     * Summary of login
     *
     * @return array
     */
    public function login(array $data)
    {
        $user = $this->userRepository->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new Exception('Tài khoản hoặc mật khẩu không chính xác');
        }
        $token = $user->createToken('api-token')->plainTextToken;

        return [
            'status' => true,
            'message' => 'Đăng nhập thành công',
            'data' => [
                'user' => $user,
                'token' => $token,
            ],
        ];
    }
}
