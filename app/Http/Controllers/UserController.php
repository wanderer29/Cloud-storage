<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $data = $request->validated();
        $user = $this->createUser($data);
        
    }

    public function createUser(array $data): User
    {
        return User::create([
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
