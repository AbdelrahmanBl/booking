<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;

class AdminLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AdminLoginRequest $request)
    {
        $guard = auth()->guard('admin');

        $guard->attempt($request->validated());

        if(! $guard->check()) {
            return $this->errorResponse($request->all(), __('auth.failed'));
        }

        return $this->successResponse([
            'token' => $guard->user()->createToken('admin-token', ['admin'])->plainTextToken,
            'profile' => $guard->user(),
        ]);
    }
}
