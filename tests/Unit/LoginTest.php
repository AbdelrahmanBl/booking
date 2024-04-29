<?php

namespace Tests\Unit\Admin;

use App\Models\Employee;
use App\Models\User;
use App\Services\LoginService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase,
        WithFaker;

    /**
     * A basic unit test example.
     */
    public function test_admin_can_login(): void
    {
        $password = $this->faker()->password(6, 16);

        $employee = Employee::factory()->create([
            'password' => $password,
        ]);

        $guard = LoginService::make()
        ->useAdminGuard()
        ->login([
            'email' => $employee->email,
            'password' => $password,
        ]);

        $this->assertTrue($guard->check());
    }

    /**
     * A basic unit test example.
     */
    public function test_admin_cant_login_with_invalid_password(): void
    {
        $password = $this->faker()->password(6, 16);

        $employee = Employee::factory()->create([
            'password' => $password,
        ]);

        try {
            LoginService::make()
            ->useAdminGuard()
            ->login([
                'email' => $employee->email,
                'password' => $this->faker()->password(6, 16),
            ]);
        }
        catch(\Exception $e) {
            $this->assertTrue($e instanceof ValidationException);
        }
    }

    /**
     * A basic unit test example.
     */
    public function test_client_can_login(): void
    {
        $password = $this->faker()->password(6, 16);

        $user = User::factory()->create([
            'password' => $password,
        ]);

        $guard = LoginService::make()
        ->useClientGuard()
        ->login([
            'email' => $user->email,
            'password' => $password,
        ]);

        $this->assertTrue($guard->check());
    }

    /**
     * A basic unit test example.
     */
    public function test_client_cant_login_with_invalid_password(): void
    {
        $password = $this->faker()->password(6, 16);

        $user = User::factory()->create([
            'password' => $password,
        ]);

        try {
            LoginService::make()
            ->useClientGuard()
            ->login([
                'email' => $user->email,
                'password' => $this->faker()->password(6, 16),
            ]);
        }
        catch(\Exception $e) {
            $this->assertTrue($e instanceof ValidationException);
        }
    }
}
