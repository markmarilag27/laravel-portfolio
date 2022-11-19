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

    private array $credentials;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = action(LoginController::class);

        $this->credentials = [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(6).'1@',
        ];

        User::factory()->create([
            'email' => $this->credentials['email'],
            'password' => Hash::make($this->credentials['password']),
        ]);
    }

    public function testLoginSuccessWhenCorrectCredentialsProvided(): void
    {
        $this->json('POST', $this->endpoint, $this->credentials)
            ->assertOk()
            ->assertJson(fn (AssertableJson $json) => $json->has('data')
                    ->has('data.access_token')
                    ->has('data.user')
            );
    }

    public function testLoginFailedWhenIncorrectPasswordProvided(): void
    {
        $credentials = [...$this->credentials];
        $credentials['password'] = $this->faker->password(8).'1@';

        $this->json('POST', $this->endpoint, $credentials)
            ->assertUnprocessable()
            ->assertJson(fn (AssertableJson $json) => $json->has('message')
                    ->has('errors')
                    ->where('errors.password.0', trans('auth.password'))
            );
    }

    public function testLoginFailedWhenIncorrectEmailProvided(): void
    {
        $credentials = [...$this->credentials];
        $credentials['email'] = $this->faker->email;

        $this->json('POST', $this->endpoint, $credentials)
            ->assertUnprocessable()
            ->assertJson(fn (AssertableJson $json) => $json->has('message')
                    ->has('errors')
                    ->where('errors.email.0', trans('auth.failed'))
            );
    }

    public function testLoginFailedRequiresStrongPassword(): void
    {
        $credentials = [...$this->credentials];
        $credentials['password'] = (string) mt_rand(00000001, 99999999);

        $this->json('POST', $this->endpoint, $credentials)
            ->assertUnprocessable()
            ->dd()
            ->assertJson(fn (AssertableJson $json) => $json->has('message')
                    ->has('errors')
            );
    }
}
