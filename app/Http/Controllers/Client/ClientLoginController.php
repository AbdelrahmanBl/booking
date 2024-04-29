<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientLoginRequest;
use App\Services\LoginService;

class ClientLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ClientLoginRequest $request)
    {
        $guard = LoginService::make()
        ->useClientGuard()
        ->login($request->validated());

        return $this->successResponse([
            'token' => $guard->user()->createToken('client-token', ['client'])->plainTextToken,
            'profile' => $guard->user(),
        ]);
    }
}
