<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Http\Controllers\API\Auth\LoginController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private string $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = action(LoginController::class);
    }

    public function testLoginSuccessWhenProvideCorrectCredentials(): void
    {
        $credentials = [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(6).'1@'
        ];

        User::factory()->create([
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password'])
        ]);

        $this->json('POST', $this->endpoint, $credentials)
            ->assertOk()
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data')
                    ->has('data.access_token')
                    ->has('data.user')
            );
    }
}
