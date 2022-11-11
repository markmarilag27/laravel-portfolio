<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:10,2');
    }

    public function __invoke(LoginRequest $request)
    {
        /** @var array $payload */
        $payload = $request->validated();
    }
}
