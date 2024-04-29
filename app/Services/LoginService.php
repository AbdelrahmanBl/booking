<?php

namespace App\Services;

use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;

class LoginService
{
    protected $guardName;

    public static function make(): self
    {
        return new self;
    }

    public function useAdminGuard(): self
    {
        $this->guardName = 'admin';

        return $this;
    }

    public function useClientGuard(): self
    {
        $this->guardName = 'web';

        return $this;
    }

    public function login(array $data)
    {
        $guard = auth()->guard($this->guardName);

        $guard->attempt($data);

        if(! $guard->check()) {
            throw ValidationException::withMessages([__('auth.failed')]);
        }

        return $guard;
    }
}
