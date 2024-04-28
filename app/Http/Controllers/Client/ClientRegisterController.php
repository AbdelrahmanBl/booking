<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientRegisterRequest;
use App\Models\User;

class ClientRegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ClientRegisterRequest $request)
    {
        User::query()->create($request->validated());

        return $this->successResponse([], __('messages.register'));
    }
}
