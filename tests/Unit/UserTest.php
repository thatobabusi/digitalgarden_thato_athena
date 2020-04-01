<?php

namespace Tests\Unit;

use App\Models\User\User;
use App\Repositories\User\UserRepository;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /*public function testItCanCreateUser()
    {
        $faker = new Faker();

        $data = [
            'name' => 'Test sUser',
            'email' => 'testuser@test.net',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        $userRepository = new UserRepository();
        $user = $userRepository->storeNewUserRecord($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);
        $this->assertEquals($data['email_verified_at'], $user->email_verified_at);
        $this->assertEquals($data['password'], $user->password);
        $this->assertEquals($data['remember_token'], $user->remember_token);
    }*/
}
