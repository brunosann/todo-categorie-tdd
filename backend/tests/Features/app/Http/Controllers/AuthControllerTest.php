<?php

namespace Features\app\Http\Controllers;

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
  use DatabaseTransactions;

  public function testUserCanLogin()
  {
    // prepare
    $user = User::factory()->create([
      'email' => 'jhondoe@gmail.com'
    ]);

    $payload = [
      'email' => $user->email,
      'password' => 'password',
    ];

    // Act
    $response = $this->post(route('login'), $payload);

    // assert
    $response->assertResponseStatus(200);
    $response->seeJsonStructure([
      'access_token',
      'token_type',
      'expires_in',
      'user' => [
        'name',
        'email',
      ],
    ]);
  }

  public function testUserCredentialsMustBeCorrectToLogin()
  {
    // prepare
    $user = User::factory()->create([
      'email' => 'jhondoe@gmail.com'
    ]);

    $payload = [
      'email' => $user->email,
      'password' => 'password-wrong',
    ];

    // Act
    $response = $this->post(route('login'), $payload);

    // assert
    $response->assertResponseStatus(401);
    $response->seeJsonStructure(['error']);
  }
}
