<?php

namespace App\Enums;

use App\Traits\EnumHandler;

enum BookingStatus: string
{
    use EnumHandler;

    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
