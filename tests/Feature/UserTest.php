<?php

namespace Tests\Feature;

use App\Models\User\User;
use App\Repositories\User\UserRepository;

use Faker\Generator as Faker;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(302); //because redirects to blog
        //$response->assertStatus(200);
    }
}
