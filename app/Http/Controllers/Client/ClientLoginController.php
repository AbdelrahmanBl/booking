<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientLoginRequest;

class ClientLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ClientLoginRequest $request)
    {
        auth()->attempt($request->validated());

        if(! auth()->check()) {
            return $this->errorResponse($request->all(), __('auth.failed'));
        }

        return $this->successResponse([
            'token' => auth()->user()->createToken('client-token', ['client'])->plainTextToken,
            'profile' => auth()->user(),
        ]);
    }
}
