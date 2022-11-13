<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:10,2');
    }

    public function __invoke(LoginRequest $request): JsonResponse
    {
        /** @var array $payload */
        $payload = $request->validated();

        /** @var User $user */
        $user = User::query()->where('email', $payload['email'])->first();

        if (blank($user)) {
            $message = trans('auth.failed');

            return $this->responseWithErrors(
                $message,
                ['email' => [$message]],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        if (! Hash::check($payload['password'], $user->password)) {
            $message = trans('auth.password');

            return $this->responseWithErrors(
                $message,
                ['password' => [$message]],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $accessToken = $user->createToken($request->userAgent())->plainTextToken;

        return $this->responseWithAccessToken($accessToken, $user);
    }
}
