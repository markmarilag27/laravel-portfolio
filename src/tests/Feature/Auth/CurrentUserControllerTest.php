<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Http\Controllers\API\Auth\CurrentUserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CurrentUserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Sanctum::actingAs($this->user, ['*']);
    }

    public function testCurrentUserGetItsInformation(): void
    {
        $this->assertAuthenticated();

        $endpoint = action([CurrentUserController::class, 'getInformation']);

        $this->json('GET', $endpoint)
            ->assertOk()
            ->assertJson(fn (AssertableJson $json) => $json->where('data.name', $this->user->name)
                    ->where('data.email', $this->user->email)
                    ->where('data.uuid', $this->user->uuid)
            );
    }

    public function testCurrentUserCanLogoutWithResponseRedirectUrl(): void
    {
        $this->assertAuthenticated();

        $endpoint = action([CurrentUserController::class, 'logout']);

        $this->json('POST', $endpoint)
            ->assertOk();
    }
}
