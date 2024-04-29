<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Services\LoginService;

class AdminLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AdminLoginRequest $request)
    {
        $guard = LoginService::make()
        ->useAdminGuard()
        ->login($request->validated());

        return $this->successResponse([
            'token' => $guard->user()->createToken('admin-token', ['admin'])->plainTextToken,
            'profile' => $guard->user(),
        ]);
    }
}
