<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserLoginAndRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testUserLoginSuccess(): void
    {
        User::create([
            'login' => 'testlogin',
            'password' => bcrypt('testpassword'),
        ]);

        $response = $this->post('/login', [
            'login' => 'testlogin',
            'password' => 'testpassword',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $response->assertSessionHas('success');
    }

    public function testUserCannotLoginWithIncorrectPassword(): void
    {
        User::create([
            'login' => 'testlogin',
            'password' => bcrypt('testpassword'),
        ]);

        $response = $this->post('/login', [
            'login' => 'testlogin',
            'password' => 'testpassword1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHas('error');
    }

    public function testUserCannotLoginWithIncorrectLogin(): void
    {
        User::create([
            'login' => 'testlogin',
            'password' => bcrypt('testpassword'),
        ]);

        $response = $this->post('/login', [
            'login' => 'wronglogin',
            'password' => 'testpassword',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHas('error');
    }

    public function testUserRegistrationSuccess(): void
    {
        $response = $this->post('register', [
            'login' => 'testlogin',
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $response->assertSessionHas('success');
    }

    public function testUserRegistrationErrorWithPasswordMismatch(): void
    {
        $response = $this->post('register', [
            'login' => 'testlogin',
            'password' => 'testpassword1',
            'password_confirmation' => 'testpassword2',
        ]);

        $response->assertRedirect('/register');
        $response->assertStatus(302);
        $response->assertSessionHas('error');
    }

    public function testFailedRegisterIfLoginAlreadyTaken(): void
    {
        User::create([
            'login' => 'testlogin',
            'password' =>bcrypt('testpassword'),
        ]);

        $response = $this->post('register', [
            'login' => 'testlogin',
            'password' => 'testpassword',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/register');
        $response->assertSessionHas('error');
    }
}
