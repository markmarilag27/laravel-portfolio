<?php

namespace App\Http\Controllers;

use App\Http\Resources\API\UserResource;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function responseWithAuthorizationBearer(string $accessToken, User $user, int $statusCode = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'data' => [
                'user' => new UserResource($user),
            ],
        ], $statusCode)
            ->withHeaders([
                'Authorization' => 'Bearer '.$accessToken,
            ]);
    }

    protected function responseWithErrors(string $message, array $errors, int $statusCode = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'errors' => [...$errors],
        ], $statusCode);
    }

    protected function responseWithErrorMessage(string $message, int $statusCode = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $statusCode);
    }
}
