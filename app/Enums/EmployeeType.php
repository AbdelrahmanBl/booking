<?php

namespace App\Enums;

use App\Traits\EnumHandler;

enum EmployeeType: string
{
    use EnumHandler;

    case ADMIN = 'admin';
    case EMPLOYEE = 'employee';
}
