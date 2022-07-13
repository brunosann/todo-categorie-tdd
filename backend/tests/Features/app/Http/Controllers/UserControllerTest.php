<?php

namespace Features\app\Http\Controllers;

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
  use DatabaseTransactions;

  public function testUserCanRegister()
  {
    // prepare
    $payload = [
      'name' => 'Jhon Doe',
      'email' => 'jhon_doe@gmail.com',
      'password' => '12345678',
    ];

    // Act
    $response = $this->post('/user/register', $payload);

    // assert
    $this->seeInDatabase('users', ['email' => 'jhon_doe@gmail.com']);
    $response->assertResponseStatus(201);
  }

  public function testUserMustSendNameAndEmailAndPassword()
  {
    // prepare
    $payload = [
      'name' => 'Jhon Doe',
    ];

    // Act
    $response = $this->post('/user/register', $payload);

    // assert
    $response->assertResponseStatus(422);
  }

  public function testEmailMustBeUniqueInTheDatabase()
  {
    // prepare
    $user = User::factory()->create(['email' => 'jhon_doe@gmail.com']);

    $payload = [
      'name' => 'Jhon Doe',
      'email' => $user->email,
      'password' => '12345678',
    ];

    // Act
    $response = $this->post('/user/register', $payload);

    // assert
    $response->assertResponseStatus(422);
    $response->seeJsonStructure(['email']);
  }
}
