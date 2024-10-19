<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user = $this->createUser($data);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Registration successful');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();

        //If Authorization success
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Login successful');
        }

        return redirect()->route('login')->with('error', 'Invalid login or password');
    }

    public function createUser(array $data): User
    {
        return User::create([
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
