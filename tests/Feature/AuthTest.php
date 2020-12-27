<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private function generateANewUser()
    {
        return User::factory()->make([
            'password' => $this->faker->password
        ]);
    }

    private function createANewUser(User $user): TestResponse
    {
        return $this->post(route('auth.register'), [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'password_confirmation' => $user->password
        ]);
    }

    private function login(User $user): TestResponse
    {
        return $this->post(route('auth.login'), [
            'email' => $user->email,
            'password' => $user->password,
        ]);
    }

    public function testRegisterRoute()
    {
        $user = $this->generateANewUser();
        $response = $this->createANewUser($user);
        $response->assertSuccessful()
            ->assertStatus(201)
            ->assertJsonStructure([
                'user',
                'message'
            ])
            ->assertJsonFragment([
                'message' => 'User successfully registered'
            ]);
    }

    public function testRegisterRouteWithARegisteredUser()
    {
        $user = $this->generateANewUser();
        $this->createANewUser($user);
        $response = $this->createANewUser($user);
        $response->assertStatus(400);
    }

    public function testLoginRoute()
    {
        $user = $this->generateANewUser();
        $this->createANewUser($user);
        $response = $this->login($user);
        $response->assertSuccessful()
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
            ]);
    }

    public function testLoginRouteWithoutRegisteredUser()
    {
        $response = $this->post(route('auth.login'), [
            'email' => $this->faker->email,
            'password' => $this->faker->password,
        ]);
        $response->assertStatus(401);
    }

    public function testProfileRoute()
    {
        $tempUser = $this->generateANewUser();
        $this->createANewUser($tempUser);
        $user = User::where('email', $tempUser->email)->first();
        $user->email_verified_at = Carbon::now();
        $user->save();
        $token = JWTAuth::fromUser($user);
        $response = $this->get(route('auth.profile'), [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertSuccessful()
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
            ]);
    }

    public function testProfileRouteWithoutVerifiedEmail()
    {
        $tempUser = $this->generateANewUser();
        $this->createANewUser($tempUser);
        $user = User::where('email', $tempUser->email)->first();
        $token = JWTAuth::fromUser($user);
        $response = $this->get(route('auth.profile'), [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(302);
    }

    public function testProfileRouteWithoutToken()
    {
        $tempUser = $this->generateANewUser();
        $this->createANewUser($tempUser);
        $user = User::where('email', $tempUser->email)->first();
        $token = JWTAuth::fromUser($user);
        $response = $this->get(route('auth.profile'));

        $response->assertStatus(500);
    }

    public function testRefreshTokenRoute()
    {
        $tempUser = $this->generateANewUser();
        $this->createANewUser($tempUser);
        $user = User::where('email', $tempUser->email)->first();
        $token = JWTAuth::fromUser($user);
        $response = $this->postJson(route('auth.refresh'), [], [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertSuccessful()
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token'
            ]);
    }

    public function testRefreshTokenRouteWithoutRegisteredUser()
    {
        $response = $this->post(route('auth.refresh'), [
            'email' => $this->faker->email,
            'password' => $this->faker->password,
        ]);
        $response->assertStatus(500);
    }

    public function testLogoutRoute()
    {
        $tempUser = $this->generateANewUser();
        $this->createANewUser($tempUser);
        $user = User::where('email', $tempUser->email)->first();
        $token = JWTAuth::fromUser($user);
        $response = $this->postJson(route('auth.logout'), [], [
            'Authorization' => "Bearer {$token}"
        ]);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'message' => 'User successfully signed out'
            ]);
    }

//    //Create user and authenticate the user
//    protected function authenticate(){
//        $user = User::create([
//            'name' => 'test',
//            'email' => 'test@gmail.com',
//            'password' => Hash::make('secret1234'),
//        ]);
//        $token = JWTAuth::fromUser($user);
//        return $token;
//    }
//

}
