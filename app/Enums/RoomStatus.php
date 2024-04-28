<?php

namespace App\Enums;

use App\Traits\EnumHandler;

enum RoomStatus: string
{
    use EnumHandler;

    case AVAILABLE = 'available';
    case BOOKED = 'booked';
    case PENDING = 'pending';
}
