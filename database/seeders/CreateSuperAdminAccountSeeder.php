<?php

namespace Database\Seeders;

use App\Enums\EmployeeType;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateSuperAdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::query()->firstOrCreate(
            ['email' => Employee::SUPER_ADMIN_EMAIL],
            [
                'name' => 'Super Admin',
                'password' => '123456',
                'type' => EmployeeType::ADMIN,
            ]
        );
    }
}
